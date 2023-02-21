@extends('admin.index')

@section('pagecss')
    <link rel="stylesheet" href="{{ asset('asset/css/vendor/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/vendor/datatables.responsive.bootstrap4.min.css') }}">
@endsection


@section('contentpage')
    <div class="row">
        <div class="col-12">
            <h1>Tabel Data Produk</h1>
            <div class="top-right-button-container">
                <div class="btn-group btn-group-sm mr-2 mb-1" role="group">
                    <button type="button" class="btn btn-primary btn top-right-button " data-toggle="modal"
                        data-target="#exportModal"> <i class="simple-icon-magnifier-add"></i> <b> Import</b></button>
                    <a href="{{ asset('file') . '/' . $set->exportfile }}" type="button" class="btn btn-primary"><i
                            class="simple-icon-cloud-download"></i></a>
                    <a type="button" target="_blank" class="btn btn-primary btn top-right-button mr-1"
                        href="{{ route('barang.export') }}"> <i class="simple-icon-magnifier-add"></i> <b> Export</b></a>
                </div>

                <button type="button" class="btn btn-primary btn top-right-button mr-1" data-toggle="modal"
                    data-target="#exampleModalRight"> <i class="simple-icon-magnifier-add"></i> <b> Tambah
                        Produk</b></button>
            </div>
            <div class="modal fade modal-right" id="exportModal" tabindex="-1" role="dialog" aria-labelledby="exportModal"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Import Data Barang</h5><button type="button" class="close"
                                data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <form id="formimport">
                                @csrf

                                <div class="form-group"><label>File</label> <input type="file" class="form-control"
                                        placeholder="input Harga" name="excel"></div>
                            </form>
                        </div>
                        <div class="modal-footer"><button type="button" class="btn btn-outline-primary"
                                data-dismiss="modal">Cancel</button> <button type="button" id="submitimport"
                                class="btn btn-primary">Submit</button></div>
                    </div>
                </div>
            </div>
            <div class="modal fade modal-right" id="exampleModalRight" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalRight" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Produk Baru</h5><button type="button" class="close"
                                data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <form id="adddata">
                                @csrf
                                <div class="form-group"><label>Kode Produk</label> <input type="text"
                                        class="form-control" placeholder="input Kode Produk" name="kode"></div>

                                <div class="form-group"><label>Nama Produk</label> <input type="text"
                                        class="form-control" placeholder="input Nama Produk" name="nama"></div>
                                <div class="form-group"><label>Merek Produk</label> <input type="text"
                                        class="form-control" placeholder="input Merek Produk" name="merek"></div>
                                <div class="form-group"><label>Kuantitas</label> <input type="text" class="form-control"
                                        placeholder="input Kuantitas" name="kuantitas"></div>
                                <div class="form-group"><label>Satuan</label> <input type="text" class="form-control"
                                        placeholder="input Satuan" name="satuan"></div>
                                <div class="form-group">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jenisproduk"
                                            id="inlineRadio1" value="parfum">
                                        <label class="form-check-label" for="inlineRadio1">Parfum</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jenisproduk"
                                            id="inlineRadio2" value="botol">
                                        <label class="form-check-label" for="inlineRadio2">Botol</label>
                                    </div>


                                </div>
                                <div class="form-group"><label>Harga</label> <input disabled type="number"
                                        class="form-control" placeholder="..." id="harga" name="harga"></div>
                                <div class="form-group"><label>Gambar</label> <input type="file" class="form-control"
                                        placeholder="input Harga" name="gambar"></div>
                            </form>
                        </div>
                        <div class="modal-footer"><button type="button" class="btn btn-outline-primary"
                                data-dismiss="modal">Cancel</button> <button type="button" id="submitadd"
                                class="btn btn-primary">Submit</button></div>
                    </div>
                </div>
            </div>

            <div class="modal fade modal-right" id="exampleModalRightu" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalRight" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Data Produk</h5><button type="button" class="close"
                                data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <form id="adddatau">
                                @csrf
                                <input type="hidden" id="idu" name="id">
                                <div class="form-group"><label>Kode Produk</label>
                                    <input type="text" class="form-control" id="kodeu"
                                        placeholder="input Kode Produk" name="kode">
                                </div>

                                <div class="form-group"><label>Nama Produk</label>
                                    <input type="text" id="namau" class="form-control"
                                        placeholder="input Nama Produk" name="nama">
                                </div>
                                <div class="form-group">
                                    <label>Merek Produk</label>
                                    <input type="text" class="form-control" id="mereku"
                                        placeholder="input Merek Produk" name="merek">
                                </div>
                                <div class="form-group">
                                    <label>Kuantitas</label> <input type="text" id="kuantitasu" class="form-control"
                                        placeholder="input Kuantitas" name="kuantitas">
                                </div>
                                <div class="form-group"><label>Satuan</label> <input id="satuanu" type="text"
                                        class="form-control" placeholder="input Satuan" name="satuan"></div>
                                <div class="form-group">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jenisproduk"
                                            id="inlineRadio1" value="parfum">
                                        <label class="form-check-label" for="inlineRadio1">Parfum</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jenisproduk"
                                            id="inlineRadio2" value="botol">
                                        <label class="form-check-label" for="inlineRadio2">Botol</label>
                                    </div>


                                </div>
                                <div class="form-group"><label>Harga</label>
                                    <input type="number" class="form-control" id="hargau" placeholder="..."
                                        id="harga" name="harga">
                                </div>
                                <div class="form-group"><label>Gambar</label>
                                    <input type="file" class="form-control" id="gambaru" placeholder="input Harga"
                                        name="gambar">
                                </div>

                            </form>
                        </div>
                        <div class="modal-footer"><button type="button" class="btn btn-outline-primary"
                                data-dismiss="modal">Cancel</button> <button type="button" id="submitaddu"
                                class="btn btn-primary">Submit</button></div>
                    </div>
                </div>
            </div>
            <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                <ol class="breadcrumb pt-0">
                    <li class="breadcrumb-item"><a href="#">Admin</a></li>
                    <li class="breadcrumb-item"><a href="#">Data Master</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Produk</li>
                </ol>
            </nav>
            <div class="separator mb-5"></div>
        </div>
    </div>
    <div class="alert alert-danger d-none" id="notif" role="alert">
        <div id="listnotif">

        </div>
    </div>

    <div id="suksesnotif"></div>

    <div id="suksesnotifu"></div>
    <div id="suksesnotifd"></div>

    <div class="row mb-4">
        <div class="col-12 mb-4">
            <div class="card">
                <div class="card-body col-12 mb-4 data-table-rows data-tables-hide-filter">
                    <table id="productss" class="data-table responsive nowrap">
                        <thead>
                            <tr>
                                <th>No</th>

                                <th>Nama Produk</th>
                                <th>Kode Produk</th>
                                <th>Merek</th>
                                <th>Jumlah</th>
                                <th>Satuan</th>
                                <th>Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('pagejs')
    <script src="{{ asset('asset/js/vendor/datatables.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js
                                                                    "></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        url = window.location.origin;
        $('input[type=radio][name=jenisproduk]').change(function() {
            if (this.value == 'parfum') {
                $("#harga").attr("placeholder", 'input Dollar $');
            } else if (this.value == 'botol') {
                $("#harga").attr("placeholder", 'input Rupiah Rp.');
            }
            $("#harga").removeAttr("disabled");

        });

        function upd(id) {
            console.log(id);
            $("#idu").val(id.id);
            $("#namau").val(id.nama);
            $("#kodeu").val(id.kode);
            $("#mereku").val(id.merek);
            $("#hargau").val(id.harga);
            $("#satuanu").val(id.satuan);
            $("#kuantitasu").val(id.jumlah);
            $('input:radio[name=jenisproduk][value="' + id.jenis + '"]').attr('checked', true);
        }
        $("#submitadd").on('click', function() {
            $("#adddata").trigger('submit');
        });
        $("#submitaddu").on('click', function() {
            $("#adddatau").trigger('submit');
        });
        $("#submitimport").on('click', function() {
            $("#formimport").trigger('submit');
        });
        $("#formimport").on('submit', function(id) {
            id.preventDefault();
            var data = new FormData(this);
            $.LoadingOverlay("show");
            $.ajax({
                url: '{{ route('barang.import') }}',
                data: data,
                type: "POST",
                contentType: false,
                processData: false,
                success: function(id) {
                    console.log(id);
                    $.LoadingOverlay("hide");

                    if (id.status == 'error') {
                        var data = id.data;
                        var elem;
                        var result = Object.keys(data).map((key) => [data[key]]);
                        elem =
                            '<div class="alert alert-danger alert-dismissible fade show pt-3" role="alert">';
                        elem +=
                            '   <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button><ul>';
                        result.forEach(function(data) {
                            elem += '<li>' + data[0][0] + '</li>';
                        });
                        elem += '</ul></div>';
                        $("#notif").removeClass('d-none');
                        $("#listnotif").html(elem);
                    } else {
                        $('#exampleModalRight').modal('hide');
                        $('#suksesnotif').html(
                            '<div class="alert alert-success alert-dismissible rounded " role="alert">    <strong>Berhasil Menambah Data</strong>    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
                        );

                        $("#notif").addClass('d-none');
                        $("#listnotif").html('');
                        tabel.ajax.reload();
                        $('#adddata').trigger("reset");

                    }
                }
            })


        })
        $("#adddata").on('submit', function(id) {
            id.preventDefault();
            var data = new FormData(this);
            $.LoadingOverlay("show");
            $.ajax({
                url: '{{ route('barang.store') }}',
                data: data,
                type: "POST",

                contentType: false,
                processData: false,
                success: function(id) {
                    console.log(id);
                    $.LoadingOverlay("hide");

                    if (id.status == 'error') {
                        var data = id.data;
                        var elem;
                        var result = Object.keys(data).map((key) => [data[key]]);
                        elem =
                            '<div class="alert alert-danger alert-dismissible fade show pt-3" role="alert">';
                        elem +=
                            '   <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button><ul>';
                        result.forEach(function(data) {
                            elem += '<li>' + data[0][0] + '</li>';
                        });
                        elem += '</ul></div>';
                        $("#notif").removeClass('d-none');
                        $("#listnotif").html(elem);
                    } else {
                        $('#exampleModalRight').modal('hide');
                        $('#suksesnotif').html(
                            '<div class="alert alert-success alert-dismissible rounded " role="alert">    <strong>Berhasil Menambah Data</strong>    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
                        );

                        $("#notif").addClass('d-none');
                        $("#listnotif").html('');
                        tabel.ajax.reload();
                        $('#adddata').trigger("reset");

                    }
                }
            })


        })
        $("#adddatau").on('submit', function(id) {
            id.preventDefault();
            var data = new FormData(this);
            $.LoadingOverlay("show");


            $.ajax({
                url: '{{ route('barang.update') }}',
                data: data,
                type: "POST",

                contentType: false,
                processData: false,
                success: function(id) {
                    console.log(id);
                    $.LoadingOverlay("hide");

                    if (id.status == 'error') {
                        var data = id.data;
                        var elem;
                        var result = Object.keys(data).map((key) => [data[key]]);
                        elem =
                            '<div class="alert alert-danger alert-dismissible fade show pt-3" role="alert">';
                        elem +=
                            '   <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button><ul>';
                        result.forEach(function(data) {
                            elem += '<li>' + data[0][0] + '</li>';
                        });
                        elem += '</ul></div>';
                        $("#notif").removeClass('d-none');
                        $("#listnotif").html(elem);
                    } else {
                        $('#exampleModalRightu').modal('hide');
                        $('#suksesnotifu').html(
                            '<div class="alert alert-success alert-dismissible  rounded " id="suksesnotifu" role="alert">    <strong>Berhasil Mengubah Data</strong>    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
                        );



                        $("#notif").addClass('d-none');
                        $("#listnotif").html('');
                        tabel.ajax.reload();

                    }
                }
            })


        })

        tabel = $("#productss").DataTable({
            columnDefs: [{
                    orderable: false,
                    targets: 0,
                    width: "1%",
                },
                {
                    orderable: false,
                    targets: 2,
                    width: "15%",

                },
                {
                    targets: 1,
                    width: "15%",

                },
                {
                    targets: 3,
                    width: "10%",

                },
                {
                    targets: 4,
                    width: "10%",

                },
                {
                    targets: 5,
                    width: "10%",
                    orderable: false,

                },
                {
                    targets: 6,
                    width: "10%",
                    orderable: false,

                },

            ],
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('barang.index') }}",
            },
            columns: [{
                    nama: 'DT_RowIndex',
                    data: 'DT_RowIndex'
                }, {
                    nama: 'namanya',
                    data: 'namanya'
                }, {
                    name: 'kode',
                    data: 'kode',
                }, {
                    name: 'merek',
                    data: 'merek'
                },
                {
                    name: 'kuantitasnya',
                    data: 'kuantitasnya'
                },
                {
                    name: 'satuannya',
                    data: 'satuannya'
                },
                {
                    name: 'harganya',
                    data: 'harganya'
                },
                {
                    name: 'aksi',
                    data: 'aksi',
                }
            ]
        });

        function del(id) {
            data = confirm("Klik Ok Untuk Melanjutkan");

            if (data) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.LoadingOverlay("show");

                $.ajax({
                    url: url + '/admin/data-barang/' + id,
                    type: "delete",
                    success: function(e) {
                        $.LoadingOverlay("hide");
                        if (e == 'success') {
                            tabel.ajax.reload();
                            $('#suksesnotifd').html(
                                '<div class="alert alert-success alert-dismissible rounded " role="alert">    <strong>Berhasil Menghapus Data</strong>    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
                            );
                        }
                    }
                })

            }
        }
    </script>
@endpush
