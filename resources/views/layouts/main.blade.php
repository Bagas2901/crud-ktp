<!DOCTYPE html>
<!-- By  :
            Bagas Aruna Yudhatama 
     FB  :
            Bagas AY
-->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>CRUD KTP &mdash; {{ $title }}</title>
    <link rel="shortcut icon" href="{{ asset('img/stisla-fill.svg') }}">

    <!-- General CSS Files -->
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}" type="text/css" />
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap-4.3.1-dist/css/bootstrap.min.css') }}" type="text/css" />

    <!-- CSS Libraries -->
    <!--===============================================================================================-->
    <link rel="stylesheet" href="{{ asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}"
        type="text/css" />
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}" type="text/css" />
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}"
        type="text/css" />
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}"
        type="text/css" />
    <!-- daterange picker -->
    <link rel="stylesheet"
        href="{{ asset('plugins/bootstrap-datepicker/css/bootstrap-datepicker3.standalone.min.css') }}"
        type="text/css" />

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('css/components.css') }}" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.css"
        integrity="sha512-DIW4FkYTOxjCqRt7oS9BFO+nVOwDL4bzukDyDtMO7crjUZhwpyrWBFroq+IqRe6VnJkTpRAS6nhDvf0w+wHmxg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" id="body_atas" data-toggle="sidebar" class="nav-link nav-link-lg"><i
                                    class="fas fa-bars"></i></a></li>
                    </ul>
                </form>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown"><a href="#" data-toggle="dropdown"
                            class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="{{ asset('img/avatar/' . auth()->user()->foto) }}"
                                class="rounded-circle mr-1">
                            <div class="d-sm-none d-lg-inline-block">Hi,
                                {{ auth()->user()->is_admin == '0' ? 'User' : 'Admin' }}
                                {{ auth()->user()->name }}</div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <form action="/logout" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item btn-icon-split btn-block has-icon text-danger">
                                    <i class="fas fa-sign-out-alt"></i> Logout
                                </button>
                            </form>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="index.html">CRUD - KTP</a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="index.html">KTP</a>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="menu-header">Data KTP</li>
                        <li class="{{ $title === 'KTP' ? 'active' : '' }}">
                            <a href="/ktp" class="nav-link"><i class="fas fa-id-card"></i><span>KTP</span></a>
                        </li>
                        <div {{ auth()->user()->is_admin == '0' ? 'hidden' : '' }}>
                            <li class="menu-header">Data User</li>
                            <li class="{{ $title === 'User' ? 'active' : '' }}">
                                <a href="/user" class="nav-link"><i
                                        class="fas fa-users"></i><span>User</span></a>
                            </li>
                        </div>

                    </ul>

                    <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
                        <form action="/logout" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-lg btn-block btn-icon-split">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </button>
                        </form>
                    </div>
                </aside>
            </div>

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    @yield('container')
                </section>
            </div>
            <footer class="main-footer">
                <div class="footer-left col-md-6">
                    Copyright &copy; 2021 <div class="bullet"></div> By <a
                        href="https://wa.me/6281617976739">Bagas
                        Aruna Yudhatama</a>
                </div>
                <div class="footer-right col-md-3">
                    1.0.0
                </div>

            </footer>
        </div>
    </div>

    <section>
        @yield('modal')
    </section>

    <!-- General JS Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="{{ asset('plugins/bootstrap-4.3.1-dist/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="{{ asset('js/stisla.js') }}" type="text/javascript"></script>

    <!-- JS Libraies -->
    <script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}" type="text/javascript">
    </script>
    <!-- datepicker -->
    <script src="{{ asset('plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}" type="text/javascript">
    </script>
    <!-- DataTables -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}" type="text/javascript">
    </script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}" type="text/javascript"></script>
    <!-- JQVMap -->
    <script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js') }}" type="text/javascript">
    </script>
    <script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}" type="text/javascript">
    </script>
    <!-- Select2 -->
    <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}" type="text/javascript">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.js"
        integrity="sha512-OmBbzhZ6lgh87tQFDVBHtwfi6MS9raGmNvUNTjDIBb/cgv707v9OuBVpsN6tVVTLOehRFns+o14Nd0/If0lE/A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Template JS File -->
    <script src="{{ asset('js/scripts.js') }}" type="text/javascript"></script>

    <!-- yajra Datatable User-->
    <script type="text/javascript">
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var table = $('.yajra-datatable-user').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('user') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'username',
                        name: 'username'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'role',
                        name: 'role'
                    },
                    {
                        data: 'foto',
                        name: 'foto'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: true,
                        searchable: true
                    },
                ],
            });
        });
    </script>

    <!-- yajra Datatable KTP-->
    <script type="text/javascript">
        $(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var table = $('.yajra-datatable-ktp').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('ktp') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                    },
                    {
                        data: 'nik',
                        name: 'nik'
                    },
                    {
                        data: 'nama',
                        name: 'nama'
                    },
                    {
                        data: 'tmp_lahir',
                        name: 'tmp_lahir'
                    },
                    {
                        data: 'umur',
                        name: 'umur'
                    },
                    {
                        data: 'jk',
                        name: 'jk'
                    },
                    {
                        data: 'gol_darah',
                        name: 'gol_darah'
                    },
                    {
                        data: 'alamat',
                        name: 'alamat'
                    },
                    {
                        data: 'agama',
                        name: 'agama'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'pekerjaan',
                        name: 'pekerjaan'
                    },
                    {
                        data: 'kewarganegaraan',
                        name: 'kewarganegaraan'
                    },
                    {
                        data: 'berlaku',
                        name: 'berlaku'
                    },
                    {
                        data: 'foto',
                        name: 'foto'
                    },
                    @if (auth()->user()->is_admin != '0')
                        {
                        data: 'action',
                        name: 'action',
                        orderable: true,
                        searchable: true
                        },
                    @endif

                ],
            });

            // hapus data KTP 
            $(document).ready(function() {

            });

        });
    </script>
</body>

</html>
