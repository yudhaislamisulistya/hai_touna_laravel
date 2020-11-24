@extends('layouts.admin')
@section('title', "TourGuide - Admin Panel Hai Touna")
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
                    <h4 class="page-title mb-0 font-size-18">TourGuide</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active">TourGuide</li>
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
                        <h4 class="card-title">Daftar TourGuide</h4>
                        <p class="card-title-desc">Silahkan Tambah Data TourGuide Dengan Menekan Tombol Ini <button
                                data-toggle="modal" data-target=".modalTambahData" href=""
                                class="btn btn-primary btn-sm"><i class="bx bxs-add-to-queue"></i></button></p>
                        <table id="datatable-data-tourguide" class="table table-striped table-bordered dt-responsive"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Gambar</th>
                                    <th>Nama</th>
                                    <th>Status</th>
                                    <th>Kontak</th>
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
                <h5 class="modal-title mt-0" id="modalTambahData">Tambah Data TourGuide</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="uploadDataTourGuide" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label>Nama</label>
                        <input id="nama" type="text" class="form-control" name="nama" required
                            placeholder="Masukkan Judul TourGuide" />
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <input id="statuses" type="text" class="form-control" name="statuses" required
                            placeholder="Masukkan Status" />
                    </div>
                    <div class="form-group">
                        <label>Kontak</label>
                        <input id="kontak" type="text" class="form-control" name="kontak" required
                            placeholder="Masukkan Kontak" />
                    </div>
                    <div class="form-group">
                        <div class="custom-file">
                            <input id="file" name="file" type="file">
                        </div>
                    </div>
                </form>
                <div class="form-group mb-0">
                    <div class="tombolSubmit">
                        <button id="tambahDataTourGuide" type="submit"
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
                <h5 class="modal-title mt-0" id="modalUbahData">Ubah Data TourGuide</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="uploadUbahDataTourGuide" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" id="id_tourguide_ubah">
                    <div class="form-group">
                        <label>Nama</label>
                        <input id="nama_ubah" type="text" class="form-control" name="nama_ubah" required
                            placeholder="Masukkan Judul TourGuide" />
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <input id="status_ubah" type="text" class="form-control" name="status_ubah" required
                            placeholder="Masukkan Status" />
                    </div>
                    <div class="form-group">
                        <label>Kontak</label>
                        <input id="kontak_ubah" type="text" class="form-control" name="kontak_ubah" required
                            placeholder="Masukkan Kontak" />
                    </div>
                </form>
                <div class="form-group mb-0">
                    <div>
                        <div class="tombolSubmit">
                            <button id="ubahDataTourGuide" type="submit"
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
    var table = $('#datatable-data-tourguide').DataTable();
    tinymce.init({
        selector: '.tiny-editor'
    });

    function getDataTable() {
            table.destroy();
            table = $('#datatable-data-tourguide').DataTable({
                ajax:{
                    url: "{{URL('api/tourguide/all') }}",
                },
                "columns": [
                    {
                        sortable: false,
                        "render": function (data, type, full, meta) {
                            return `
                                        <td>
                                            <img src="{{asset('files')}}/`+full.gambar+`" alt="" width="80" height="auto" class="rounded">
                                        </td>
                                    `;
                        }
                    },
                    {
                        data: "nama"
                    },
                    {
                        data: "status"
                    },
                    {
                        data: "kontak"
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
                                            <button data-toggle="modal" data-target=".modalUbahData" id="lihatDataTourGuide" data-id="` + full.id_tourguide + `" class="btn btn-info btn-small"><i
                                                    class="bx bx-paint d-line"></i></button>
                                            <button id="hapusDataTourGuide" data-id="` + full.id_tourguide + `" class="btn btn-danger btn-small"><i class="bx bx-trash-alt"></i></button>
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

    $('#tambahDataTourGuide').on('click', function () {
        let formData = new FormData(document.getElementById("uploadDataTourGuide"));
        $.ajax({
            type: 'POST',
            data: formData,
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            url: '{{route('addTourGuide')}}',
            beforeSend: function(){
                $('.loader').show();
                $('.tombolSubmit').hide();
            },
            success: function (response) {
                $('.loader').hide();
                $('.tombolSubmit').show();
                console.log(response);
                if (response.status == "berhasil") {
                    Swal.fire(
                        'Status!',
                        'Data TourGuide Berhasil Di Tambahkan!',
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
                        'Data TourGuide Gagal Di Tambahkan!',
                        'error'
                    )
                }
            }.bind($(this))
        });
    });


    $(document).on("click", '#hapusDataTourGuide', function () {
        var id_tourguide = $(this).data("id");
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
                    url: '{{route('destroyTourGuide')}}',
                    type: 'DELETE',
                    dataType: "JSON",
                    data: {
                        "id_tourguide": id_tourguide
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

    $(document).on("click", '#lihatDataTourGuide', function () {
        var id_tourguide = $(this).data("id");
        $.ajax({
            url: "{{URL('api/tourguide/get') }}" + "/" + id_tourguide,
            type: 'GET',
            dataType: "JSON",
            success: function (response) {
                $('#nama_ubah').val(response.nama);
                $('#status_ubah').val(response.status);
                $('#kontak_ubah').val(response.kontak);
                $('#id_tourguide_ubah').val(response.id_tourguide);
            },
            error: function (xhr) {
                console.log(xhr.responseText);
            }
        });
    });

    $(document).on('click', "#ubahDataTourGuide" ,function () {
        let formData = new FormData();
        var id_tourguide_ubah = $('#id_tourguide_ubah').val();
        formData.append('nama_ubah', $('#nama_ubah').val());
        formData.append('status_ubah', $('#status_ubah').val());
        formData.append('kontak_ubah', $('#kontak_ubah').val());
        formData.append('_token', $("input[name=_token]").val());
        $.ajax({
            type: 'POST',
            data: formData,
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            url: "{{URL('api/tourguide/change') }}" + "/" + id_tourguide_ubah,
            beforeSend: function(){
                $('.loader').show();
                $('.tombolSubmit').hide();
            },
            success: function (response) {
                $('.loader').hide();
                $('.tombolSubmit').show();
                console.log(response);
                if (response.status == "berhasil") {
                    Swal.fire(
                        'Status!',
                        'Data TourGuide Berhasil Di Ubah!',
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
                        'Data TourGuide Gagal Di Ubah!',
                        'error'
                    )
                }
            }.bind($(this))
        });
    });

</script>
@endsection
