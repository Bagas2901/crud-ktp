<!DOCTYPE html>
<!-- By  :
            Bagas Aruna Yudhatama 
    FB  :
            Bagas AY
-->
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
	<title>CRUD KTP &mdash; Login</title>
	<link rel="shortcut icon" href="{{ asset('img/stisla-fill.svg')}}">

	<!-- General CSS Files -->
	<!-- Font Awesome -->
	<link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}" type="text/css" />
	<!-- Tempusdominus Bbootstrap 4 -->
	<link rel="stylesheet" href="{{ asset('plugins/bootstrap-4.3.1-dist/css/bootstrap.min.css') }}" type="text/css" />
	<!--===============================================================================================-->
	<link rel="stylesheet" href="{{ asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}" type="text/css" />

	<!-- Template CSS -->
	<link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css" />
	<link rel="stylesheet" href="{{ asset('css/components.css') }}" type="text/css" />
</head>

<body>
	<div id="app">
		<section class="section">
			<div class="d-flex flex-wrap align-items-stretch">
				<div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white">
					<div class="p-4 m-3">
						<img src="{{ asset('img/stisla-fill.svg') }}" alt="logo" width="80" class="shadow-light rounded-circle mb-5 mt-2">
						<h4 class="text-dark font-weight-normal">Selamat Datang di Apliaksi<span class="font-weight-bold text-primary ">Create, Read, Update, Delete KTP</span></h4>
						<p class="text-muted">Sebelum melanjutkan ke aktivitas anda, silahkan login terlebih dahulu.</p>
						<form method="POST" action="proses_login" class="needs-validation" novalidate="">
							@csrf
							<div class="form-group">
								<label for="username">Username</label>
								<input id="username" type="text" class="form-control" name="username" tabindex="1" required autofocus>
								<div class="invalid-feedback">
									Tolong isi username terlebih dahulu
								</div>
							</div>

							<div class="form-group">
								<div class="d-block">
									<label for="password" class="control-label">Password</label>
								</div>
								<input id="password" type="password" class="form-control" name="password" tabindex="2" required>
								<div class="invalid-feedback">
									Tolong isi password terlebih dahulu
								</div>
							</div>

							<div class="form-group text-right">
								<button type="submit" class="btn btn-primary btn-lg btn-icon icon-right" tabindex="4">
									Login
								</button>
							</div>
						</form>

						<div class="text-center mt-5 text-small">
							Copyright &copy; 2021 Made with 💙 By <a href="https://wa.me/6281617976739">Bagas Aruna Yudhatama</a>
						</div>
					</div>
				</div>
				<div class="col-lg-8 col-12 order-lg-2 order-1 min-vh-100 background-walk-y position-relative overlay-gradient-bottom" data-background="{{ asset('img/unsplash/login-bg.jpg') }}">
					<div class="absolute-bottom-left index-2">
						<div class="text-light p-5 pb-2">
							<div class="mb-5 pb-3">
								<h1 class="mb-2 display-4 font-weight-bold">Selamat Datang</h1>
								<h3 class="font-weight-bold text-muted-transparent">Semarang, Indonesia</h3>
								<br>
								<div class="h5" id='tgl'></div>
								<div class="h5" id='jam'></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>

	<!-- General JS Scripts -->
	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="{{ asset('plugins/bootstrap-4.3.1-dist/js/bootstrap.min.js') }}" type="text/javascript"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
	<script src="{{ asset('js/stisla.js') }}" type="text/javascript"></script>
	<script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}" type="text/javascript"></script>
	<!-- //tgl -->
	<script language="JavaScript">
		var tanggallengkap = new String();
		var namahari = ("Minggu Senin Selasa Rabu Kamis Jumat Sabtu");
		namahari = namahari.split(" ");
		var namabulan = ("Januari Februari Maret April Mei Juni Juli Agustus September Oktober November Desember");
		namabulan = namabulan.split(" ");
		var tgl = new Date();
		var hari = tgl.getDay();
		var tanggal = tgl.getDate();
		var bulan = tgl.getMonth();
		var tahun = tgl.getFullYear();
		document.getElementById("tgl").innerHTML = namahari[hari] + ", " + tanggal + " " + namabulan[bulan] + " " + tahun;
	</script>
	<!-- jam -->
	<script type="text/javascript">
		// 1 detik = 1000
		window.setTimeout("waktu()", 1000);

		function waktu() {
			var tanggal = new Date();
			setTimeout("waktu()", 1000);
			document.getElementById("jam").innerHTML = tanggal.getHours() + ":" + tanggal.getMinutes() + ":" + tanggal.getSeconds();
		}
	</script>

	<!-- Page Specific JS File -->
    <!-- Template JS File -->
    <script src="{{ asset('js/scripts.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/custom.js') }}" type="text/javascript"></script>
</body>

</html>