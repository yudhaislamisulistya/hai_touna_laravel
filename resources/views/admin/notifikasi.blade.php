@extends('layouts.admin')
@section('title', "Notifikasi - Admin Panel Hai Touna")
@section('content')
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<style>
    .loader{
        display: none;
    }
    .tombolSubmit{
        display: contents;
    }
</style>
<div class="main-content">

    <div class="page-content">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="page-title mb-0 font-size-18">Notifikasi</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active">Notifikasi</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Daftar Notifikasi</h4>
                        <p class="card-title-desc">Silahkan Tambah Data Notifikasi Dengan Menekan Tombol Ini <button
                                data-toggle="modal" data-target=".modalTambahData" href=""
                                class="btn btn-primary btn-sm"><i class="bx bxs-add-to-queue"></i></button></p>
                        <table id="datatable-data-notifikasi" class="table table-striped table-bordered dt-responsive"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Judul</th>
                                    <th>Waktu Buat</th>
                                    <th>Waktu Ubah</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->

    </div>
    <!-- End Page-content -->

    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <script>
                        document.write(new Date().getFullYear())

                    </script> © Hai Touna.
                </div>
                <div class="col-sm-6">
                    <div class="text-sm-right d-none d-sm-block">
                        Lentera Lipuku
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
<!-- end main content-->

<!--  Tambah Data -->
<div class="modal fade modalTambahData" tabindex="-1" role="dialog" aria-labelledby="modalTambahData"
    aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="modalTambahData">Tambah Data Notifikasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="uploadDataNotifikasi" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label>Judul</label>
                        <input id="judul" type="text" class="form-control" name="judul" required
                            placeholder="Masukkan Judul Notifikasi" />
                    </div>
                </form>
                <div class="form-group mb-0">
                    <div class="tombolSubmit">
                        <button id="tambahDataNotifikasi" type="submit"
                            class="btn btn-primary waves-effect waves-light mr-1">
                            Submit
                        </button>
                    </div>
                    <div class="loader">
                        <img src="{{asset('assets/images/loading.gif')}}" alt="" width="50" height="auto">
                    </div>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!--  Ubah Data -->
<div class="modal fade modalUbahData" tabindex="-1" role="dialog" aria-labelledby="modalUbahData"
    aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="modalUbahData">Ubah Data Notifikasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="uploadUbahDataNotifikasi" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" id="id_notifikasi_ubah">
                    <div class="form-group">
                        <label>Judul</label>
                        <input id="judul_ubah" type="text" class="form-control" name="judul_ubah" required/>
                    </div>
                </form>
                <div class="form-group mb-0">
                    <div>
                        <div class="tombolSubmit">
                            <button id="ubahDataNotifikasi" type="submit"
                                class="btn btn-primary waves-effect waves-light mr-1">
                                Submit
                            </button>
                        </div>
                        <div class="loader">
                            <img src="{{asset('assets/images/loading.gif')}}" alt="" width="50" height="auto">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

@endsection

@section('javascript')
<script>


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var table = $('#datatable-data-notifikasi').DataTable();
    tinymce.init({
        selector: '.tiny-editor'
    });

    function getDataTable() {
            table.destroy();
            table = $('#datatable-data-notifikasi').DataTable({
                ajax:{
                    url: "{{URL('api/notifikasi/all') }}",
                },
                "columns": [
                    {
                        data: "judul"
                    },
                    {
                        data: "created_at"
                    },
                    {
                        data: "updated_at"
                    },
                    {
                        sortable: false,
                        "render": function (data, type, full, meta) {
                            return `
                                        <td>
                                            <button data-toggle="modal" data-target=".modalUbahData" id="lihatDataNotifikasi" data-id="` + full.id_notifikasi + `" class="btn btn-info btn-small"><i
                                                    class="bx bx-paint d-line"></i></button>
                                            <button id="hapusDataNotifikasi" data-id="` + full.id_notifikasi + `" class="btn btn-danger btn-small"><i class="bx bx-trash-alt"></i></button>
                                        </td>
                                    `;
                        }
                    },
                ]
            })
    }


    $(document).ready(function () {
        getDataTable();
    });

    $('#tambahDataNotifikasi').on('click', function () {
        let formData = new FormData(document.getElementById("uploadDataNotifikasi"));
        $.ajax({
            type: 'POST',
            data: formData,
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            url: '{{route('addNotifikasi')}}',
            beforeSend: function(){
                $('.loader').show();
                $('.tombolSubmit').hide();
            },
            success: function (response) {
                $('.loader').hide();
                $('.tombolSubmit').show();
                if (response.status == "berhasil") {
                    Swal.fire(
                        'Status!',
                        'Data Notifikasi Berhasil Di Tambahkan!',
                        'success'
                    )
                    table.ajax.reload( null, false );
                } else if (response.status == "kurang") {
                    Swal.fire(
                        'Status!',
                        'Ada Data Yang Belum Terisi',
                        'warning'
                    )
                } else if (response.status == "gagal") {
                    Swal.fire(
                        'Status!',
                        'Data Notifikasi Gagal Di Tambahkan!',
                        'error'
                    )
                }
            }.bind($(this))
        });
    });


    $(document).on("click", '#hapusDataNotifikasi', function () {
        var id_notifikasi = $(this).data("id");
        Swal.fire({
            title: 'Apakah Benar Mau Menghapus?',
            text: "Data Yang Dihapus Tidak Dapat Dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, hapus!'
            }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: '{{route('destroyNotifikasi')}}',
                    type: 'DELETE',
                    dataType: "JSON",
                    data: {
                        "id_notifikasi": id_notifikasi
                    },
                    success: function (response) {
                        if (response.status = "berhasil") {
                            Swal.fire(
                                'Status!',
                                'Data Berhasil Dihapus!',
                                'success'
                            )
                            table.ajax.reload( null, false );
                        }else if(response.status == "gagal"){
                            Swal.fire(
                                'Status!',
                                'Data Gagal Dihapus!',
                                'error'
                            )
                        }
                    },
                    error: function (xhr) {
                        console.log(xhr.responseText);
                    }
                });
            }else{
                Swal.fire(
                'Status!',
                'Data Gagal Dihapus.',
                'error'
                )
            }
        })
    });

    $(document).on("click", '#lihatDataNotifikasi', function () {
        var id_notifikasi = $(this).data("id");
        $.ajax({
            url: "{{URL('api/notifikasi/get') }}" + "/" + id_notifikasi,
            type: 'GET',
            dataType: "JSON",
            success: function (response) {
                $('#judul_ubah').val(response.judul);
                $('#id_notifikasi_ubah').val(response.id_notifikasi);
            },
            error: function (xhr) {
                console.log(xhr.responseText);
            }
        });
    });

    $('#ubahDataNotifikasi').on('click', function () {
        let formData = new FormData();
        var id_notifikasi_ubah = $('#id_notifikasi_ubah').val();
        formData.append('judul_ubah', $('#judul_ubah').val());
        $.ajax({
            type: 'POST',
            data: formData,
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            url: "{{URL('api/notifikasi/change') }}" + "/" + id_notifikasi_ubah,
            beforeSend: function(){
                $('.loader').show();
                $('.tombolSubmit').hide();
            },
            success: function (response) {
                $('.loader').hide();
                $('.tombolSubmit').show();
                if (response.status == "berhasil") {
                    Swal.fire(
                        'Status!',
                        'Data Notifikasi Berhasil Di Ubah!',
                        'success'
                    )
                    table.ajax.reload( null, false );
                } else if (response.status == "kurang") {
                    Swal.fire(
                        'Status!',
                        'Ada Data Yang Belum Terisi',
                        'warning'
                    )
                } else if (response.status == "gagal") {
                    Swal.fire(
                        'Status!',
                        'Data Notifikasi Gagal Di Ubah!',
                        'error'
                    )
                }
            }.bind($(this))
        });
    });

</script>
@endsection
