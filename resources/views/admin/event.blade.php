@extends('layouts.admin')
@section('title', "Event - Admin Panel Hai Touna")
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
                    <h4 class="page-title mb-0 font-size-18">Event</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active">Event</li>
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
                        <h4 class="card-title">Daftar Event</h4>
                        <p class="card-title-desc">Silahkan Tambah Data Event Dengan Menekan Tombol Ini <button
                                data-toggle="modal" data-target=".modalTambahData" href=""
                                class="btn btn-primary btn-sm"><i class="bx bxs-add-to-queue"></i></button></p>
                        <table id="datatable-data-event" class="table table-striped table-bordered dt-responsive"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Gambar</th>
                                    <th>Judul</th>
                                    <th>Keterangan</th>
                                    <th>Tanggal Event</th>
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
                <h5 class="modal-title mt-0" id="modalTambahData">Tambah Data Event</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="uploadDataEvent" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label>Judul</label>
                        <input id="judul" type="text" class="form-control" name="judul" required
                            placeholder="Masukkan Judul Event" />
                    </div>
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input id="tanggal" type="text" class="form-control" name="tanggal" required
                            placeholder="Masukkan Tanggal Event" />
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea id="keterangan" class="tiny-editor"
                            name="keterangan">Silahkan Isi Keterengan Disini</textarea>
                    </div>
                    <div class="form-group">
                        <div class="custom-file">
                            <input id="file" name="file" type="file">
                        </div>
                    </div>
                </form>
                <div class="form-group mb-0">
                    <div class="tombolSubmit">
                        <button id="tambahDataEvent" type="submit"
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
                <h5 class="modal-title mt-0" id="modalUbahData">Ubah Data Event</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="uploadUbahDataEvent" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" id="id_event_ubah">
                    <div class="form-group">
                        <label>Judul</label>
                        <input id="judul_ubah" type="text" class="form-control" name="judul_ubah" required/>
                    </div>
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input id="tanggal_ubah" type="text" class="form-control" name="tanggal_ubah" required
                            placeholder="Masukkan Tanggal Event" />
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea id="keterangan_ubah" class="tiny-editor"
                            name="keterangan_ubah
                            keterangan_ubah"></textarea>
                    </div>
                </form>
                <div class="form-group mb-0">
                    <div>
                        <div class="tombolSubmit">
                            <button id="ubahDataEvent" type="submit"
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
    var table = $('#datatable-data-event').DataTable();
    tinymce.init({
        selector: '.tiny-editor'
    });

    function getDataTable() {
            table.destroy();
            table = $('#datatable-data-event').DataTable({
                ajax:{
                    url: "{{URL('api/event/all') }}",
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
                                            `+fn(strip_html_tags(stripHtml(full.keterangan)), 20)+`
                                        </td>
                                    `;
                        }
                    },
                    {
                        data: "tanggal_event"
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
                                            <button data-toggle="modal" data-target=".modalUbahData" id="lihatDataEvent" data-id="` + full.id_event + `" class="btn btn-info btn-small"><i
                                                    class="bx bx-paint d-line"></i></button>
                                            <button id="hapusDataEvent" data-id="` + full.id_event + `" class="btn btn-danger btn-small"><i class="bx bx-trash-alt"></i></button>
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

    $('#tambahDataEvent').on('click', function () {
        let formData = new FormData();
        var keterangan = tinymce.activeEditor.getContent();
        var files = $('#file')[0].files[0];
        formData.append('judul', $('#judul').val());
        formData.append('tanggal', $('#tanggal').val());
        formData.append('keterangan', keterangan);
        formData.append('file', files);
        $.ajax({
            type: 'POST',
            data: formData,
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            url: '{{route('addEvent')}}',
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
                        'Data Event Berhasil Di Tambahkan!',
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
                        'Data Event Gagal Di Tambahkan!',
                        'error'
                    )
                }
            }.bind($(this))
        });
    });


    $(document).on("click", '#hapusDataEvent', function () {
        var id_event = $(this).data("id");
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
                    url: '{{route('destroyEvent')}}',
                    type: 'DELETE',
                    dataType: "JSON",
                    data: {
                        "id_event": id_event
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

    $(document).on("click", '#lihatDataEvent', function () {
        var id_event = $(this).data("id");
        $.ajax({
            url: "{{URL('api/event/get') }}" + "/" + id_event,
            type: 'GET',
            dataType: "JSON",
            success: function (response) {
                $('#judul_ubah').val(response.judul);
                $('#tanggal_ubah').val(response.tanggal_event);
                $('#id_event_ubah').val(response.id_event);
                tinyMCE.activeEditor.setContent(response.keterangan);
            },
            error: function (xhr) {
                console.log(xhr.responseText);
            }
        });
    });

    $('#ubahDataEvent').on('click', function () {
        let formData = new FormData();
        var keterangan_ubah = tinymce.activeEditor.getContent();
        var id_event_ubah = $('#id_event_ubah').val();
        formData.append('judul_ubah', $('#judul_ubah').val());
        formData.append('tanggal_ubah', $('#tanggal_ubah').val());
        formData.append('keterangan_ubah', keterangan_ubah);
        $.ajax({
            type: 'POST',
            data: formData,
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            url: "{{URL('api/event/change') }}" + "/" + id_event_ubah,
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
                        'Data Event Berhasil Di Ubah!',
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
                        'Data Event Gagal Di Ubah!',
                        'error'
                    )
                }
            }.bind($(this))
        });
    });

</script>
@endsection
