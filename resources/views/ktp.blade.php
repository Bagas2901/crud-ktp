@extends('layouts.main')

@section('container')

    <div class="section-header">
        <h1>KTP</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Tabel Data KTP</h4>
                        <div {{ (auth()->user()->is_admin == '0') ? 'hidden' : '' }} class="col">
                            <a data-toggle="modal" title="Klik untuk menambah data" href="#tambahData"
                                class="btn btn-primary btn-md float-right">Tambah Data </i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <a href="/ktp/export_csv" style="width:60px;" target="_blank"
                                class="btn btn-success me-1">CSV</a>
                            <a href="/ktp/export_excel" style="width:60px;" target="_blank"
                                class="btn btn-success me-1">Excel</a>
                            <a href="/ktp/export_pdf" style="width:60px;" target="_blank"
                                class="btn btn-success me-1">PDF</a>

                            <a {{ (auth()->user()->is_admin == '0') ? 'hidden' : '' }} data-toggle="modal" title="Klik untuk import file" href="#importData"
                                class="float-lg-right btn btn-primary me-1"><i class="fas fa-upload"></i> Import</a>
                        </div>

                        <div class="box-body table-responsive">
                            <!-- tabel Pelatihan -->
                            <table class="yajra-datatable-ktp table table-bordered table-hover">
                                <!-- Thead -->
                                <thead>
                                    <tr style="background-color:white;">
                                        <th class="title-center" style="font-size:1em; text-align:center;">No.</th>
                                        <th class="title-center" style="font-size:1em; text-align:center;">NIK</th>
                                        <th class="title-center" style="font-size:1em; text-align:center;">Nama</th>
                                        <th class="title-center" style="font-size:1em; text-align:center;">Tempat/Tgl
                                            Lahir</th>
                                        <th class="title-center" style="font-size:1em; text-align:center;">Umur</th>
                                        <th class="title-center" style="font-size:1em; text-align:center;">Jenis Kelamin
                                        </th>
                                        <th class="title-center" style="font-size:1em; text-align:center;">Gol Darah</th>
                                        <th class="title-center" style="font-size:1em; text-align:center;">Alamat</th>
                                        <th class="title-center" style="font-size:1em; text-align:center;">Agama</th>
                                        <th class="title-center" style="font-size:1em; text-align:center;">Status</th>
                                        <th class="title-center" style="font-size:1em; text-align:center;">Pekerjaan</th>
                                        <th class="title-center" style="font-size:1em; text-align:center;">Kewarganegaraan
                                        </th>
                                        <th class="title-center" style="font-size:1em; text-align:center;">Berlaku</th>
                                        <th class="title-center" style="font-size:1em; text-align:center;">Foto</th>
                                        <th {{ (auth()->user()->is_admin == '0') ? 'hidden' : '' }} class="title-center" style="font-size:1em; text-align:center;">Action</th>
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

    <!-- Modal Import File -->
    <div class="modal fade" id="importData">
        <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Import File</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body modal-edit">
                    <form id="Import" action="javascript:void(0)" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>File</label>
                                    <input style="color: black; width: 100%;" type="file" accept=".csv"
                                        onchange="return validasiFile()" name="file" id="file" required>
                                    <b><label style="color:red;">Hanya Menerima File .csv</label></b>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="card-footer text-right">
                    <button name="import" id="import" type="submit" class="btn btn-primary">Import</button>
                </div>
            </div>
            </form>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <!-- Modal Tambah Data -->
    <div class="modal fade" id="tambahData">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Data KTP</h4>
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
                                            <label>NIK</label>
                                            <input type="number" pattern="/^-?\d+\.?\d*$/"
                                                onKeyPress="if(this.value.length==16) return false;" class="form-control"
                                                name="nik" id="nik" required="" placeholder="Masukan NIK">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input type="text" class="form-control" name="nama" id="nama"
                                                placeholder="Masukan Nama Lengkap" required="">
                                            <div class="invalid-feedback">
                                                Nama tidak boleh kosong
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Tempat Lahir</label>
                                            <input type="text" class="form-control" name="tmp_lahir" id="tmp_lahir"
                                                placeholder="Masukan Tempat Lahir" required="">
                                            <div class="invalid-feedback">
                                                Tempat Lahir tidak boleh kosong
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Tanggal Lahir</label>
                                            <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir"
                                                required="">
                                            <div class="invalid-feedback">
                                                Tempat Lahir tidak boleh kosong
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Umur</label>
                                            <input type="text" class="form-control" name="umur" id="umur" readonly
                                                required="">
                                            <div class="invalid-feedback">
                                                Tanggal Lahir tidak boleh kosong
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Jenis Kelamin</label>
                                            <select name="jk" id="jk" class="status form-control select2" required="">
                                                <option value="" disabled selected>--Pilih Jenis Kelamin--</option>
                                                <option value="l">Laki-Laki</option>
                                                <option value="p">Perempuan</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Pilih Jenis Kelamin
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Golongan Darah</label>
                                            <select name="gol_darah" id="gol_darah" class="status form-control select2"
                                                required="">
                                                <option value="" disabled selected>--Pilih Gol Darah--</option>
                                                <option value="A">A</option>
                                                <option value="AB">AB</option>
                                                <option value="B">B</option>
                                                <option value="O">O</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Pilih Golongan Darah
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Agama</label>
                                            <select name="agama" id="agama" class="status form-control select2" required="">
                                                <option value="" disabled selected>--Pilih Agama--</option>
                                                <option value="Islam">Islam</option>
                                                <option value="Katolik">Katolik</option>
                                                <option value="Kristen">Kristen</option>
                                                <option value="Hindu">Hindu</option>
                                                <option value="Budha">Budha</option>
                                                <option value="Konghucu">Konghucu</option>
                                                <option value="Kepercayaan Lain">Kepercayaan Lain</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Pilih Agama
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Alamat Rumah</label>
                                            <textarea class="form-control" name="alamat" id="alamat" cols="30" rows="10"
                                                required=""></textarea>
                                            <div class="invalid-feedback">
                                                Masukan alamat
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select name="status" id="status" class="status form-control select2"
                                                required="">
                                                <option value="" disabled selected>--Pilih Status--</option>
                                                <option value="Belum Kawin">Belum Kawin</option>
                                                <option value="Kawin">Kawin</option>
                                                <option value="Cerai Hidup">Cerai Hidup</option>
                                                <option value="Cerai Mati">Cerai Mati</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Pilih Status
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Pekerjaan</label>
                                            <input type="text" class="form-control" placeholder="Masukan Pekerjaan"
                                                name="pekerjaan" id="pekerjaan" required="">
                                            <div class="invalid-feedback">
                                                Masukan Pekerjaan
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Kewarganegaraan</label>
                                            <select name="kewarganegaraan" id="kewarganegaraan"
                                                class="status form-control select2" required="">
                                                <option value="" disabled selected>--Pilih Kewarganegaraan--</option>
                                                <option value="WNA">WNA</option>
                                                <option value="WNI">WNI</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Pilih Kewarganegaraan
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
                                                onchange="return validasiFoto()" name="foto" id="foto" required>
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
                    <h4 class="modal-title">Edit Data KTP</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body modal-edit">
                    <form method="POST" enctype="multipart/form-data" id="UpdateData" action="javascript:void(0)">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>NIK</label>
                                    <input type="number" pattern="/^-?\d+\.?\d*$/"
                                        onKeyPress="if(this.value.length==16) return false;" class="form-control"
                                        name="nik" id="nik" required="" placeholder="Masukan NIK">
                                    <input type="number" pattern="/^-?\d+\.?\d*$/" readonly hidden
                                        onKeyPress="if(this.value.length==16) return false;" class="form-control"
                                        id="nik_lama" required="" placeholder="Masukan NIK">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" class="form-control" name="nama" id="nama"
                                        placeholder="Masukan Nama Lengkap" required="">
                                    <div class="invalid-feedback">
                                        Nama tidak boleh kosong
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Tempat Lahir</label>
                                    <input type="text" class="form-control" name="tmp_lahir" id="tmp_lahir"
                                        placeholder="Masukan Tempat Lahir" required="">
                                    <div class="invalid-feedback">
                                        Tempat Lahir tidak boleh kosong
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Tanggal Lahir</label>
                                    <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" required="">
                                    <div class="invalid-feedback">
                                        Tempat Lahir tidak boleh kosong
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Umur</label>
                                    <input type="text" class="form-control" id="umur" readonly required="">
                                    <div class="invalid-feedback">
                                        Tanggal Lahir tidak boleh kosong
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <select name="jk" id="edit_jk" class="status form-control select2" required="">';
                                        <option value="" disabled selected>--Pilih Jenis Kelamin--</option>
                                        <option value="l">Laki-Laki</option>
                                        <option value="p">Perempuan</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Pilih Jenis Kelamin
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Golongan Darah</label>
                                    <select name="gol_darah" id="edit_gol_darah" class="status form-control select2"
                                        required="">
                                        <option value="" disabled selected>--Pilih Gol Darah--</option>
                                        <option value="A">A</option>
                                        <option value="AB">AB</option>
                                        <option value="B">B</option>
                                        <option value="O">O</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Pilih Golongan Darah
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Agama</label>
                                    <select name="agama" id="edit_agama" class="status form-control select2" required="">
                                        <option value="" disabled selected>--Pilih Agama--</option>
                                        <option value="Islam">Islam</option>
                                        <option value="Katolik">Katolik</option>
                                        <option value="Kristen">Kristen</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Budha">Budha</option>
                                        <option value="Konghucu">Konghucu</option>
                                        <option value="Kepercayaan Lain">Kepercayaan Lain</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Pilih Agama
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Alamat Rumah</label>
                                    <textarea class="form-control" name="alamat" id="alamat" cols="30" rows="10"
                                        required=""></textarea>
                                    <div class="invalid-feedback">
                                        Masukan alamat
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" id="edit_status" class="status form-control select2" required="">
                                        <option value="" disabled selected>--Pilih Status--</option>
                                        <option value="Belum Kawin">Belum Kawin</option>
                                        <option value="Kawin">Kawin</option>
                                        <option value="Cerai Hidup">Cerai Hidup</option>
                                        <option value="Cerai Mati">Cerai Mati</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Pilih Status
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Pekerjaan</label>
                                    <input type="text" class="form-control" placeholder="Masukan Pekerjaan"
                                        name="pekerjaan" id="pekerjaan" required="">
                                    <div class="invalid-feedback">
                                        Masukan Pekerjaan
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Kewarganegaraan</label>
                                    <select name="kewarganegaraan" id="edit_kewarganegaraan"
                                        class="status form-control select2" required="">
                                        <option value="" disabled selected>--Pilih Kewarganegaraan--</option>
                                        <option value="WNA">WNA</option>
                                        <option value="WNI">WNI</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Pilih Kewarganegaraan
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
            //tanggal lahir pada form tambah onchange menentukan umur
            $("#tgl_lahir").change(function() {
                //Ambil value dari combo yg diselect
                var date = $(this).val();

                if (date === "") {
                    alert('Tidak Boleh Kosong');
                } else {
                    var now = new Date();
                    var tgl_lahir = new Date(date);
                    var year = 0;
                    if (now.getMonth() < tgl_lahir.getMonth()) {
                        year = 1;
                    } else if ((now.getMonth() == tgl_lahir.getMonth()) && now.getDate() < tgl_lahir
                        .getDate()) {
                        year = 1;
                    }
                    var age = now.getFullYear() - tgl_lahir.getFullYear() - year;

                    if (age < 17) {
                        $('#umur').val('');
                        $(this).val('');
                        iziToast.error({
                            title: 'Peringatan !',
                            message: 'Umur kurang dari 17 tahun!',
                            position: 'topCenter'
                        });
                    } else {
                        $('#umur').val(age + ' Tahun');
                    }
                }
            });

            //tanggal lahir pada modal onchange menentukan umur 
            $(".modal-edit #tgl_lahir").change(function() {
                //Ambil value dari combo yg diselect
                var date = $(this).val();

                if (date === "") {
                    alert('Tidak Boleh Kosong');
                } else {
                    var now = new Date();
                    var tgl_lahir = new Date(date);
                    var year = 0;
                    if (now.getMonth() < tgl_lahir.getMonth()) {
                        year = 1;
                    } else if ((now.getMonth() == tgl_lahir.getMonth()) && now.getDate() < tgl_lahir
                        .getDate()) {
                        year = 1;
                    }
                    var age = now.getFullYear() - tgl_lahir.getFullYear() - year;

                    if (age < 17) {
                        $('#umur').val('');
                        $(this).val('');
                        iziToast.error({
                            title: 'Peringatan !',
                            message: 'Umur kurang dari 17 tahun!',
                            position: 'topCenter'
                        });
                    } else {
                        $('.modal-edit #umur').val(age + ' Tahun');
                    }
                }
            });

            // ajax check nik unique pada form tambah
            $('#nik').focusout(function(e) {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                nik = $(this).val();
                $.ajax({
                    url: "/ktp/cek_nik/" + nik,
                    method: 'GET',
                    success: function(result) {
                        if (result.error) {
                            iziToast.error({
                                title: 'Perhatian !',
                                message: result.error,
                                position: 'topCenter'
                            });
                            $('#nik').val('');
                            $('#nik').focus();
                        }
                    }
                });
            });

            // ajax check nik unique pada form edit
            $('.modal-edit #nik').focusout(function(e) {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                nik_lama = $('.modal-edit #nik_lama').val();
                nik = $(this).val();

                if (nik != nik_lama) {
                    $.ajax({
                        url: "/ktp/cek_nik/" + nik,
                        method: 'GET',
                        success: function(result) {
                            if (result.error) {
                                iziToast.error({
                                    title: 'Perhatian !',
                                    message: result.error,
                                    position: 'topCenter'
                                });
                                $('.modal-edit #nik').val('');
                                $('.modal-edit #nik').focus();
                            }
                        }
                    });
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

                    //preview foto
                    let reader = new FileReader();
                    reader.onload = (e) => {
                        $(".modal-edit #image").attr("src", e.target.result);
                    }
                    reader.readAsDataURL(this.files[0]);
                }

            });

            // Import file csv dengan Ajax.
            $('#Import').submit(function(e) {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                var formData = new FormData(this);
                $.ajax({
                    url: "/ktp/import",
                    method: 'post',
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        this.reset();
                        if (data.error) {
                            iziToast.error({
                                title: 'Perhatian !',
                                message: data.error,
                                position: 'topCenter'
                            });
                            //hide modal
                            $('#importData').modal('hide');
                            //load table ketika klik OK
                            $('.yajra-datatable-ktp')
                                .DataTable()
                                .ajax.reload();
                        }else{
                            iziToast.success({
                                title: 'Perhatian !',
                                message: data.success,
                                position: 'topCenter'
                            });
                            //hide modal
                            $('#importData').modal('hide');
                            //load table ketika klik OK
                            $('.yajra-datatable-ktp')
                                .DataTable()
                                .ajax.reload();
                        }
                    },
                    error: function(data) {
                        iziToast.error({
                            title: 'Peringatan !',
                            message: "File gagal di import!",
                            position: 'topCenter'
                        });
                    }
                });
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
                    url: "/ktp/simpan/",
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
                        $('.yajra-datatable-ktp')
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
            $(document).on('click', '#editktp', function(e) {
                // e.preventDefault();
                id = $(this).data('id');
                $.ajax({
                    url: "/ktp/action/" + id + "/edit",
                    method: 'GET',
                    // data: {
                    //     id: id,
                    // },
                    success: function(result) {
                        // console.log(result);

                        //Umur
                        var date = result.data["tgl_lahir"];
                        var now = new Date();
                        var tgl_lahir = new Date(date);
                        var year = 0;
                        if (now.getMonth() < tgl_lahir.getMonth()) {
                            year = 1;
                        } else if ((now.getMonth() == tgl_lahir.getMonth()) && now.getDate() <
                            tgl_lahir
                            .getDate()) {
                            year = 1;
                        }
                        var age = now.getFullYear() - tgl_lahir.getFullYear() - year;
                        $('.modal-edit #umur').val(age + ' Tahun');
                        // umur end

                        //set dropdown selected
                        $(".modal-edit #edit_agama").val(result.data["agama"]).change();
                        $(".modal-edit #edit_jk").val(result.data["jk"]).change();
                        $(".modal-edit #edit_gol_darah").val(result.data["gol_darah"]).change();
                        $(".modal-edit #edit_status").val(result.data["status"]).change();
                        $(".modal-edit #edit_kewarganegaraan").val(result.data[
                                "kewarganegaraan"])
                            .change();

                        // set value
                        $('.modal-edit #nik').val(result.data["nik"]);
                        $('.modal-edit #nik_lama').val(result.data["nik"]);
                        $('.modal-edit #nama').val(result.data["nama"]);
                        $('.modal-edit #tmp_lahir').val(result.data["tmp_lahir"]);
                        $('.modal-edit #tgl_lahir').val(result.data["tgl_lahir"]);
                        $('.modal-edit #alamat').val(result.data["alamat"]);
                        $('.modal-edit #pekerjaan').val(result.data["pekerjaan"]);
                        $('.modal-edit #foto').val(result.data["foto"]);
                        $(".modal-edit #image").attr("src", "/img/avatar/" + result.data[
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
                    url: "/ktp/update/" + id,
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
                        $('.yajra-datatable-ktp')
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

            //hapus ktp
            $(document).on('click', '#hapusktp', function(e) {
                var id = $(this).data('id');
                hapusktp(id);
                e.preventDefault();
            });

            // ajax function hapus data KTP
            function hapusktp(id) {
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
                                    url: "/ktp/action/" + id,
                                    method: 'DELETE',
                                })
                                //sukses
                                .done(function(data) {
                                    Swal.fire('Berhasil!',
                                            'Data telah dihapus oleh sistem.',
                                            'success')
                                        .then((result) => {
                                            //load table ketika klik OK
                                            $('.yajra-datatable-ktp')
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

        function validasiFile() {
            var inputFile = document.getElementById('file');
            var pathFile = inputFile.value;
            var ekstensiOk = /(\.csv)$/i;
            if (!ekstensiOk.exec(pathFile)) {
                iziToast.error({
                    title: 'Perhatian !',
                    message: 'Silakan upload file dengan ekstensi .csv!',
                    position: 'topCenter'
                });
                inputFile.value = '';
                return false;
            }
        }

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
