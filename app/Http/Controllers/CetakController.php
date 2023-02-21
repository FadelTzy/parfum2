<?php

namespace App\Http\Controllers;

use App\Models\riwayatPembelian;
use App\Models\Setting;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class CetakController extends Controller
{
    public function nota($id)
    {
        $setting = Setting::get()->first();
        $transaksi = Transaksi::where('id', $id)->get()->first();

        $barang =  riwayatPembelian::where('id_transak', $id)->get();
        $total = 0;
        $diskon = 0;

        foreach ($barang as $key => $value) {
            if ($value->tipe == 'parfum') {
                if ($transaksi->kurs) {
                    $total += $value->harga * $transaksi->kurs;
                    if ($value->diskon) {
                        $diskon += (int) $value->diskon * ( $value->harga * $transaksi->kurs) * 0.01;
                    }
                }else{
                    $total += $value->harga * $setting->kurs;
                    if ($value->diskon) {
                        $diskon += (int) $value->diskon * ( $value->harga * $transaksi->kurs) * 0.01;
                    }
                }
            }else{
                $total += $value->harga;
                if ($value->diskon) {
                    $diskon += (int) $value->diskon * ( $value->harga * $transaksi->kurs) * 0.01;
                }
            }
        }
        $customPaper = array(0, 0, 180, 360);
        $no = 1;
        $settings = [
            'nama_app' => $setting->nama_app,
            'alamat' => $setting->alamat,
            'notelp' => $setting->notelp,
            'kurs' => $setting->kurs,
            'kecamatan' => $setting->kecamatan,
            'atm' => $setting->atm,
            'logo' => $setting->logo,
            'no' => $no,
            'barang' => $barang,
            'transaksi' => $transaksi,
            'total' => $total,
            'diskon' => $diskon
        ];
        // $pdf = PDF::loadview('admin.testing', $settings)->setPaper('8.5x11', 'potrait');
        dd($transaksi);
        $pdf = PDF::loadview('admin.testing_dua', $settings)->setPaper('A8', 'potrait');
        return $pdf->stream();
    }
}
