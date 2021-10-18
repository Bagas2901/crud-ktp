@extends('layouts.main')

@section('container')

    <div class="section-header">
        <h1>User</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Tabel Data User</h4>
                        <div class="col">
                            <a data-toggle="modal" title="Klik untuk menambah data" href="#tambahData"
                                class="btn btn-primary btn-md float-right">Tambah Data </i></a>
                        </div>
                    </div>
                    <div class="card-body">

                        <div class="box-body table-responsive">
                            <!-- tabel Pelatihan -->
                            <table class="yajra-datatable-user table table-bordered table-hover">
                                <!-- Thead -->
                                <thead>
                                    <tr style="background-color:white;">
                                        <th width="5%" class="title-center" style="font-size:1em; text-align:center;">No.
                                        </th>
                                        <th class="title-center" style="font-size:1em; text-align:center;">Nama</th>
                                        <th class="title-center" style="font-size:1em; text-align:center;">Username</th>
                                        <th class="title-center" style="font-size:1em; text-align:center;">Email</th>
                                        <th class="title-center" style="font-size:1em; text-align:center;">Role</th>
                                        <th class="title-center" style="font-size:1em; text-align:center;">Foto</th>
                                        <th width="10%" class="title-center" style="font-size:1em; text-align:center;">
                                            Action</th>
                                        </th>
                                    </tr>
                                </thead>
                                <!-- Tbody -->
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('modal')

    <!-- Modal Tambah Data -->
    <div class="modal fade" id="tambahData">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Data User</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card card-primary">
                        <!-- form start -->
                        <div class="card-body">
                            <form method="POST" enctype="multipart/form-data" id="SimpanData" action="javascript:void(0)">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input type="text" class="form-control" name="name" id="name"
                                                placeholder="Masukan Nama Lengkap" required="">
                                            <div class="invalid-feedback">
                                                Nama tidak boleh kosong
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input type="text" class="form-control" name="username" id="username"
                                                placeholder="Masukan Username" required="">
                                            <div class="invalid-feedback">
                                                Username tidak boleh kosong
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Role</label>
                                            <input type="text" readonly value="User" class="form-control" name="role"
                                                id="role" placeholder="Masukan Email" required="">
                                            <div class="invalid-feedback">
                                                Pilih Role
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" class="form-control" name="email" id="email"
                                                placeholder="Masukan Email" required="">
                                            <div class="invalid-feedback">
                                                Email tidak boleh kosong
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" minlength="8" class="form-control" name="password"
                                                id="password" required="">
                                            <div class="invalid-feedback">
                                                Password tidak boleh kosong
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Konfirmasi Password</label>
                                            <input type="password" minlength="8" class="form-control"
                                                name="konfirm_password" id="konfirm_password" required="">
                                            <div class="invalid-feedback">
                                                Password tidak boleh kosong
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5">
                                        <img hidden src="" alt="preview image" style="width: 55%;" id="image"
                                            name="image" />
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Foto</label>
                                            <input style="color: black; width: 100%;" type="file" accept="image/*"
                                                onchange="return validasiFoto()" name="foto" id="foto">
                                            <b><label style="color:red;">File .jpg/.jpeg/.png</label></b>
                                        </div>
                                    </div>
                                </div>
                                <input hidden readonly value="Seumur Hidup" type="text" class="form-control"
                                    name="berlaku" id="berlaku" required="">
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <div class="card-footer text-right">
                    <button name="simpan" id="simpan" type="submit" class="btn btn-primary">Tambah</button>
                </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <!-- Modal Edit Data -->
    <div class="modal fade" id="editData">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Data User</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body modal-edit">
                    <form method="POST" enctype="multipart/form-data" id="UpdateData" action="javascript:void(0)">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" class="form-control" name="name" id="name"
                                        placeholder="Masukan Nama Lengkap" required="">
                                    <div class="invalid-feedback">
                                        Nama tidak boleh kosong
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" class="form-control" name="username" id="username"
                                        placeholder="Masukan Username" required="">
                                    <input type="text" readonly hidden class="form-control"
                                        id="username_lama" >
                                    <div class="invalid-feedback">
                                        Username tidak boleh kosong
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Role</label>
                                    <input type="text" readonly value="User" class="form-control" name="role"
                                        id="role" required="">
                                    <div class="invalid-feedback">
                                        Pilih Role
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="Masukan Email" required="">
                                    <input type="email" readonly hidden class="form-control"
                                        id="email_lama" >
                                    <div class="invalid-feedback">
                                        Email tidak boleh kosong
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" minlength="8" class="form-control" name="password"
                                        id="password">
                                    <div class="invalid-feedback">
                                        Password tidak boleh kosong
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Konfirmasi Password</label>
                                    <input type="password" minlength="8" class="form-control"
                                        name="konfirm_password" id="konfirm_password">
                                    <div class="invalid-feedback">
                                        Password tidak boleh kosong
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <img src="" alt="preview image" style="width: 55%;" id="image" name="image" />
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Foto</label>
                                    <input style="color: black; width: 100%;" type="file" accept="image/*"
                                        onchange="return validasiFotoBaru()" name="foto_baru" id="foto_baru">
                                    <b><label style="color:red;">File .jpg/.jpeg/.png</label></b>
                                </div>
                            </div>
                        </div>

                        <input hidden readonly type="text" class="form-control" name="foto" id="foto" required="">
                        <input hidden readonly value="Seumur Hidup" type="text" class="form-control" name="berlaku"
                            id="berlaku" required="">
                </div>
                <div class="card-footer text-right">
                    <button name="edit" id="edit" type="submit" class="btn btn-primary">Edit</button>
                </div>
            </div>
            </form>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <!-- jQuery -->
    <script type="text/javascript" src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>

    <script>
        $(document).ready(function() {

            // ajax check username unique pada form tambah
            $('#username').focusout(function(e) {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                username = $(this).val();
                $.ajax({
                    url: "/user/cek_username/" + username,
                    method: 'GET',
                    success: function(result) {
                        if (result.error) {
                            iziToast.error({
                                title: 'Perhatian !',
                                message: result.error,
                                position: 'topCenter'
                            });
                            $('#username').val('');
                            $('#username').focus();
                        }
                    }
                });
            });

            // ajax check username unique pada form edit
            $('.modal-edit #username').focusout(function(e) {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                username_lama = $('.modal-edit #username_lama').val();
                username = $(this).val();

                if (username != username_lama) {
                    $.ajax({
                        url: "/user/cek_username/" + username,
                        method: 'GET',
                        success: function(result) {
                            if (result.error) {
                                iziToast.error({
                                    title: 'Perhatian !',
                                    message: result.error,
                                    position: 'topCenter'
                                });
                                $('.modal-edit #username').val('');
                                $('.modal-edit #username').focus();
                            }
                        }
                    });
                }

            });

            // ajax check email unique pada form tambah
            $('#email').focusout(function(e) {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                email = $(this).val();
                $.ajax({
                    url: "/user/cek_email/" + email,
                    method: 'GET',
                    success: function(result) {
                        if (result.error) {
                            iziToast.error({
                                title: 'Perhatian !',
                                message: result.error,
                                position: 'topCenter'
                            });
                            $('#email').val('');
                            $('#email').focus();
                        }
                    }
                });
            });

            // ajax check email unique pada form edit
            $('.modal-edit #email').focusout(function(e) {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                email_lama = $('.modal-edit #email_lama').val();
                email = $(this).val();

                if (email != email_lama) {
                    $.ajax({
                        url: "/user/cek_email/" + email,
                        method: 'GET',
                        success: function(result) {
                            if (result.error) {
                                iziToast.error({
                                    title: 'Perhatian !',
                                    message: result.error,
                                    position: 'topCenter'
                                });
                                $('.modal-edit #email').val('');
                                $('.modal-edit #email').focus();
                            }
                        }
                    });
                }

            });

            // cek konfirmasi password
            $('#konfirm_password').focusout(function(e) {
                e.preventDefault();
                password = $('#password').val();
                konfirm_password = $(this).val();

                if (konfirm_password != password) {
                    iziToast.error({
                        title: 'Perhatian !',
                        message: 'Konfirmasi Password tidak sama!',
                        position: 'topCenter'
                    });
                    $('#konfirm_password').val('');
                    $('#konfirm_password').focus();
                }
            });

            // cek konfirmasi password pada modal
            $('.modal-edit #konfirm_password').focusout(function(e) {
                e.preventDefault();
                password = $('.modal-edit #password').val();
                konfirm_password = $(this).val();

                if (konfirm_password != password) {
                    iziToast.error({
                        title: 'Perhatian !',
                        message: 'Konfirmasi Password tidak sama!',
                        position: 'topCenter'
                    });
                    $('.modal-edit #konfirm_password').val('');
                }
            });

            //Preview foto
            $("#foto").change(function() {
                foto = $(this).val();

                if (foto != null) {
                    $('#image').removeAttr('hidden');
                    //preview foto
                    let reader = new FileReader();
                    reader.onload = (e) => {
                        $("#image").attr("src", e.target.result);
                    }
                    reader.readAsDataURL(this.files[0]);
                }

            });

            //memberi real value foto saat input foto baru berubah
            $(".modal-edit #foto_baru").change(function() {
                foto_baru = $(this).val();

                if (foto_baru != null) {
                    $('.modal-edit #foto').val(foto_baru);
                    let reader = new FileReader();

                    reader.onload = (e) => {

                        $(".modal-edit #image").attr("src", e.target.result);
                    }
                    reader.readAsDataURL(this.files[0]);
                }

            });

            // Menambahkan Data dengan Ajax.
            $('#SimpanData').submit(function(e) {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                var formData = new FormData(this);
                $.ajax({
                    url: "/user/simpan/",
                    method: 'post',
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        this.reset();
                        iziToast.success({
                            title: 'Berhasil !',
                            message: 'Data Berhasil Disimpan!',
                            position: 'topCenter'
                        });
                        //hide modal
                        $('#tambahData').modal('hide');
                        //load table ketika klik OK
                        $('.yajra-datatable-user')
                            .DataTable()
                            .ajax.reload();
                    },
                    error: function(data) {
                        iziToast.error({
                            title: 'Peringatan !',
                            message: 'Data Gagal Disimpan!',
                            position: 'topCenter'
                        });
                    }
                });
            });

            // Menampilkan Data berdasarkan id
            $(document).on('click', '#edituser', function(e) {
                // e.preventDefault();
                id = $(this).data('id');
                $.ajax({
                    url: "/user/action/" + id + "/edit",
                    method: 'GET',
                    success: function(result) {
                        // console.log(result);

                        //merubah value is_admin
                        if (result.data["is_admin"] == '1'){
                            $role = 'Admin';
                        }else{
                            $role = 'User';
                        }
                        // set value
                        $('.modal-edit #name').val(result.data["name"]);
                        $('.modal-edit #username').val(result.data["username"]);
                        $('.modal-edit #username_lama').val(result.data["username"]);
                        $('.modal-edit #role').val($role);
                        $('.modal-edit #email').val(result.data["email"]);
                        $('.modal-edit #email_lama').val(result.data["email"]);
                        $('.modal-edit #foto').val(result.data["foto"]);
                        $(".modal-edit #image").attr("src", "/img/avatar_users/" + result.data[
                            "foto"]);
                        $('#editData').modal('show');
                    }
                });
            });

            // Ajax Update Data
            $('#UpdateData').submit(function(e) {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                var formData = new FormData(this);
                $.ajax({
                    url: "/user/update/" + id,
                    method: 'POST',
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        // this.reset();
                        iziToast.success({
                            title: 'Berhasil !',
                            message: 'Data Berhasil Diubah!',
                            position: 'topCenter'
                        });
                        //hide modal
                        $('#editData').modal('hide');
                        //load table ketika klik OK
                        $('.yajra-datatable-user')
                            .DataTable()
                            .ajax.reload();
                    },
                    error: function(data) {
                        iziToast.error({
                            title: 'Peringatan !',
                            message: 'Data Gagal Diubah!',
                            position: 'topCenter'
                        });
                    }
                });
            });

            //hapus 
            $(document).on('click', '#hapususer', function(e) {
                var id = $(this).data('id');
                hapususer(id);
                e.preventDefault();
            });

            // ajax function hapus data 
            function hapususer(id) {
                Swal.fire({
                    title: 'Apakah Anda yakin',
                    text: "Data akan dihapus secara permanen!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#6777ef',
                    cancelButtonColor: '#fc544b',
                    confirmButtonText: 'Ya, Hapus data ini!',
                    showLoaderOnConfirm: true,
                    preConfirm: function() {
                        return new Promise(function(resolve) {
                            $.ajax({
                                    url: "/user/action/" + id,
                                    method: 'DELETE',
                                })
                                //sukses
                                .done(function(data) {
                                    Swal.fire('Berhasil!',
                                            'Data telah dihapus oleh sistem.',
                                            'success')
                                        .then((result) => {
                                            //load table ketika klik OK
                                            $('.yajra-datatable-user')
                                                .DataTable()
                                                .ajax.reload();
                                        });
                                })
                                //gagal
                                .fail(function() {
                                    Swal.fire('Oops...',
                                        'Data gagal dihapus oleh sistem!',
                                        'error')
                                });
                        });
                    },
                });
            }
        });

        function validasFoto() {
            var inputFile = document.getElementById('foto');
            var pathFile = inputFile.value;
            var ekstensiOk = /(\.jpeg|png|jpg)$/i;
            if (!ekstensiOk.exec(pathFile)) {
                iziToast.error({
                    title: 'Perhatian !',
                    message: 'Silakan upload file dengan ekstensi .jpg/.jpeg/.png!',
                    position: 'topCenter'
                });
                inputFile.value = '';
                return false;
            }
        }

        function validasiFotoBaru() {
            var inputFile = document.getElementById('foto_baru');
            var pathFile = inputFile.value;
            var ekstensiOk = /(\.jpeg|png|jpg)$/i;
            if (!ekstensiOk.exec(pathFile)) {
                iziToast.error({
                    title: 'Perhatian !',
                    message: 'Silakan upload file dengan ekstensi .jpg/.jpeg/.png!',
                    position: 'topCenter'
                });
                inputFile.value = '';
                return false;
            }
        }
    </script>
@endsection
