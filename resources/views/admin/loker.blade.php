@extends('layouts.admin')
@section('title', "Loker - Admin Panel Hai Touna")
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
                    <h4 class="page-title mb-0 font-size-18">Loker</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active">Loker</li>
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
                        <h4 class="card-title">Daftar Loker</h4>
                        <p class="card-title-desc">Silahkan Tambah Data Loker Dengan Menekan Tombol Ini <button
                                data-toggle="modal" data-target=".modalTambahData" href=""
                                class="btn btn-primary btn-sm"><i class="bx bxs-add-to-queue"></i></button></p>
                        <table id="datatable-data-loker" class="table table-striped table-bordered dt-responsive"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Gambar</th>
                                    <th>Judul</th>
                                    <th>Deskripsi</th>
                                    <th>Profil</th>
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
                <h5 class="modal-title mt-0" id="modalTambahData">Tambah Data Loker</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="uploadDataLoker" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label>Judul</label>
                        <input id="judul" type="text" class="form-control" name="judul" required
                            placeholder="Masukkan Judul Loker" />
                    </div>
                    <div class="form-group">
                        <label>Deksripsi</label>
                        <textarea id="deskripsi" class="tiny-editor"
                            name="deskripsi">Silahkan Isi Deksripsi Disini</textarea>
                    </div>
                    <div class="form-group">
                        <label>Profil</label>
                        <textarea id="profil" class="tiny-editor-2"
                            name="profil">Silahkan Isi Profil Disini</textarea>
                    </div>
                    <div class="form-group">
                        <label>Kontak</label>
                        <input id="kontak" type="text" class="form-control" name="kontak" required
                            placeholder="Masukkan Kontak Loker" />
                    </div>
                    <div class="form-group">
                        <div class="custom-file">
                            <input id="file" name="file" type="file">
                        </div>
                    </div>
                </form>
                <div class="form-group mb-0">
                    <div class="tombolSubmit">
                        <button id="tambahDataLoker" type="submit"
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
                <h5 class="modal-title mt-0" id="modalUbahData">Ubah Data Loker</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="uploadUbahDataLoker" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" id="id_loker_ubah">
                    <div class="form-group">
                        <label>Judul</label>
                        <input id="judul_ubah" type="text" class="form-control" name="judul_ubah" required/>
                    </div>
                    <div class="form-group">
                        <label>Deksripsi</label>
                        <textarea id="deskripsi_ubah" class="tiny-editor"
                            name="deskripsi_ubah">Silahkan Isi Deksripsi Disini</textarea>
                    </div>
                    <div class="form-group">
                        <label>Profil</label>
                        <textarea id="profil_ubah" class="tiny-editor-2"
                            name="profil_ubah">Silahkan Isi Profil Disini</textarea>
                    </div>
                    <div class="form-group">
                        <label>Kontak</label>
                        <input id="kontak_ubah" type="text" class="form-control" name="kontak_ubah" required
                            placeholder="Masukkan Kontak Loker" />
                    </div>
                </form>
                <div class="form-group mb-0">
                    <div>
                        <div class="tombolSubmit">
                            <button id="ubahDataLoker" type="submit"
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
    var table = $('#datatable-data-loker').DataTable();
    tinymce.init({
        mode : "specific_textareas",
        editor_selector : "tiny-editor"
    });
    tinymce.init({
        mode : "specific_textareas",
        editor_selector : "tiny-editor-2"
    });

    function getDataTable() {
            table.destroy();
            table = $('#datatable-data-loker').DataTable({
                ajax:{
                    url: "{{URL('api/loker/all') }}",
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
                        data: "judul"
                    },
                    {
                        sortable: false,
                        "render": function (data, type, full, meta) {
                            return `
                                        <td id='ket'>
                                            `+fn(strip_html_tags(stripHtml(full.deskripsi)), 20)+`
                                        </td>
                                    `;
                        }
                    },
                    {
                        sortable: false,
                        "render": function (data, type, full, meta) {
                            return `
                                        <td id='ket'>
                                            `+fn(strip_html_tags(stripHtml(full.profil)), 20)+`
                                        </td>
                                    `;
                        }
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
                                            <button data-toggle="modal" data-target=".modalUbahData" id="lihatDataLoker" data-id="` + full.id_loker + `" class="btn btn-info btn-small"><i
                                                    class="bx bx-paint d-line"></i></button>
                                            <button id="hapusDataLoker" data-id="` + full.id_loker + `" class="btn btn-danger btn-small"><i class="bx bx-trash-alt"></i></button>
                                        </td>
                                    `;
                        }
                    },
                ]
            })
    }

    function stripHtml(html){
        var temporalDivElement = document.createElement("div");
        temporalDivElement.innerHTML = html;
        return temporalDivElement.textContent || temporalDivElement.innerText || "";
    }

    function strip_html_tags(str){
        if ((str===null) || (str===''))
            return false;
        else
            str = str.toString();
        return str.replace(/<[^>]*>/g, '');
    }

    function fn(text, count){
        return text.slice(0, count) + (text.length > count ? "..." : "");
    }



    $(document).ready(function () {
        getDataTable();
    });

    $('#tambahDataLoker').on('click', function () {
        let formData = new FormData();
        var deskripsi = tinyMCE.get('deskripsi').getContent()
        var profil = tinyMCE.get('profil').getContent()
        var files = $('#file')[0].files[0];
        formData.append('judul', $('#judul').val());
        formData.append('kontak', $('#kontak').val());
        formData.append('deskripsi', deskripsi);
        formData.append('profil', profil);
        formData.append('file', files);
        $.ajax({
            type: 'POST',
            data: formData,
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            url: '{{route('addLoker')}}',
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
                        'Data Loker Berhasil Di Tambahkan!',
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
                        'Data Loker Gagal Di Tambahkan!',
                        'error'
                    )
                }
            }.bind($(this))
        });
    });


    $(document).on("click", '#hapusDataLoker', function () {
        var id_loker = $(this).data("id");
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
                    url: '{{route('destroyLoker')}}',
                    type: 'DELETE',
                    dataType: "JSON",
                    data: {
                        "id_loker": id_loker
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

    $(document).on("click", '#lihatDataLoker', function () {
        var id_loker = $(this).data("id");
        $.ajax({
            url: "{{URL('api/loker/get') }}" + "/" + id_loker,
            type: 'GET',
            dataType: "JSON",
            success: function (response) {
                $('#judul_ubah').val(response.judul);
                $('#kontak_ubah').val(response.kontak);
                $('#id_loker_ubah').val(response.id_loker);
                tinyMCE.get('deskripsi_ubah').setContent(response.deskripsi);
                tinyMCE.get('profil_ubah').setContent(response.profil);
            },
            error: function (xhr) {
                console.log(xhr.responseText);
            }
        });
    });

    $('#ubahDataLoker').on('click', function () {
        let formData = new FormData();
        var deskripsi_ubah = tinyMCE.get('deskripsi_ubah').getContent()
        var profil_ubah = tinyMCE.get('profil_ubah').getContent()
        var id_loker_ubah = $('#id_loker_ubah').val();
        formData.append('judul_ubah', $('#judul_ubah').val());
        formData.append('kontak_ubah', $('#kontak_ubah').val());
        formData.append('deskripsi_ubah', deskripsi_ubah);
        formData.append('profil_ubah', profil_ubah);
        $.ajax({
            type: 'POST',
            data: formData,
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            url: "{{URL('api/loker/change') }}" + "/" + id_loker_ubah,
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
                        'Data Loker Berhasil Di Ubah!',
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
                        'Data Loker Gagal Di Ubah!',
                        'error'
                    )
                }
            }.bind($(this))
        });
    });

</script>
@endsection
