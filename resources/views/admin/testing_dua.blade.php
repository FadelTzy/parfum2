{{-- <!DOCTYPE html> --}}
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Nota | Transaksi</title>
    <style type="text/css">
        @import url('http://fonts.cdnfonts.com/css/vcr-osd-mono');

        @page {
            margin: 10px;
        }

        body {
            font-family: 'VCR OSD Mono';
            color: #000;
            text-align: center;
            /* display: flex; */
            /* justify-content: center; */
            font-size: 8px;
            margin: 0px;
        }

        .bill {
            width: 100%;
            box-shadow: 0 0 1px #aaa;
            /* padding: 10px 10px; */
            box-sizing: border-box;
        }

        .flex {
            display: flex;
        }

        /* .justify-between {
            justify-content: space-between;
        } */

        .table {
            border-collapse: collapse;
            width: 100%;
        }

        .table .header {
            border-top: 0.5px dashed #000;
            border-bottom: 0.5px dashed #000;
        }

        .table {
            text-align: left;
        }

        .table .total td:first-of-type {
            border-top: none;
            border-bottom: none;
        }

        .table .total td {
            border-top: 0.5px dashed #000;
            border-bottom: 0.5px dashed #000;
        }

        .table .net-amount td:first-of-type {
            border-top: none;
        }

        .table .net-amount td {
            border-top: 0.5px dashed #000;
        }

        .table .net-amount {
            border-bottom: 0.5px dashed #000;
        }

        @media print {

            .hidden-print,
            .hidden-print * {
                display: none !important;
            }
        }
    </style>
</head>

<body>
    <div class="bill">
        <div class="brand">
            CV.SYAZA SYAID SEJAHTERA
        </div>
        <div class="address">
            Jl. Kerung-Kerung No.62, Mardekaya Utara, Kec. Makassar, Kota Makassar, Sulawesi Selatan, 90143
        </div>
        <table class="table">
            <tr class="header">
                <th>
                    Barang
                </th>
                <th>
                    Harga (pcs)
                </th>
                <th>
                    Qty
                </th>
                <th>
                    Harga Total
                </th>
            </tr>
            @foreach ($barang as $b)
                <tr>
                    <td>{{ $b->namabarang }}</td>
                    <td>{{ $b->harga }}</td>
                    <td>{{ $b->jumlah }}</td>
                    <td>{{ $b->harga * $b->jumlah }}</td>
                </tr>
            @endforeach
            <tr>
                <td></td>
                <td>Diskon</td>
                <td>:</td>
                <td>{{ $transaksi->diskon }}</td>
            </tr>
            <tr style="border-top: 0.5px dashed #000;">
                <td></td>
                <td>Harga Jual</td>
                <td>:</td>
                <td>{{ $transaksi->totalharga }}</td>
            </tr>
            <tr>
                <td></td>
                <td>Harga Diskon</td>
                <td>:</td>
                <td>{{ $transaksi->hargadiskon }}</td>
            </tr>
            <tr style="border-top: 0.5px dashed #000;">
                <td></td>
                <td>Total</td>
                <td>:</td>
                <td>{{ $transaksi->hargasetelahdiskon }}</td>
            </tr>
            <tr>
                <td></td>
                <td>{{ $transaksi->jenistransfer }}</td>
                <td>:</td>
                <td>{{ $transaksi->hargasetelahdiskon }}</td>
            </tr>
        </table>
        LAYANAN KONSUMEN SMS - EMAIL@EMAIL.com
    </div>


</body>

</html>
