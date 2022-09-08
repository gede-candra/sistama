<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>{{ $title_page }} | SISTAMA</title>
    {{-- Icon --}}
    <link rel="icon" type="image/*" href="{{ asset('Assets/img/sistama_logo.png') }}">

    <!-- Custom fonts for this template-->
    <link href="{{ asset('Assets/vendor/fontawesome-free-6.1.1-web/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('Assets/css/sb-admin-2.css') }}" rel="stylesheet">

    {{-- mycss --}}
    <link rel="stylesheet" href="{{ asset('Assets/css/validasi.css') }}">

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('Assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('Assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon bg-white rounded-pill p-1" style="width: 50px; height: 50px;">
                    <img src="{{ asset('Assets/img/sistama_logo.png') }}" alt="" class="h-100">
                </div>
                <div class="sidebar-brand-text ml-3">
                    SISTAMA
                </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0 ">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{ request()->is('hrd') || request()->is('karyawan') ? 'active' : '' }}">
               <a class="nav-link" href="{{ Auth::user()->posisi == "HRD" ? "/hrd" : "/karyawan" }}">
                  <i class="fas fa-fw fa-tachometer-alt"></i>
                  <span>Dashboard</span>
               </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>
            @if (Auth::user()->posisi == "HRD")
            <!-- Nav Item - Karyawan -->
            <li class="nav-item {{ request()->is('hrd/karyawan') ? 'active' : '' }}">
               <a class="nav-link" href="/hrd/karyawan">
                  <i class="fas fa-fw fa-users"></i>
                  <span>Data Karyawan</span>
               </a>
            </li>
            @endif

            <!-- Nav Item - Absensi -->
            <li class="nav-item {{ request()->is('hrd/absensi') || request()->is('karyawan/absensi') ? 'active' : '' }}">
               <a class="nav-link" href="{{ Auth::user()->posisi == "HRD" ? "/hrd/absensi" : "/karyawan/absensi"}}">
                  <i class="fas fa-fw fa-book"></i>
                  <span>Absensi</span>
               </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="d-flex flex-column text-gray-600 mr-2" style="text-align: end">
                                    <h3 class="font-weight-bold" style="font-size: 14px; margin-bottom: -2px;" id="namaUserLogin">{{ Auth::user()->name }}</h3>
                                    <span class="small font-weight-light">{{ Auth::user()->posisi }}</span>
                                </div>
                                <img class="img-profile rounded-circle"
                                    src="/Assets/img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item {{ request()->is('karyawan/profil-saya') || request()->is('hrd/profil-saya') ? 'font-weight-bold text-primary' : '' }}" href="{{ Auth::user()->posisi == "HRD" ? route('profilUserPage_HRD') : route('profilUserPage_Karyawan') }}">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 {{ request()->is('karyawan/profil-saya') || request()->is('hrd/profil-saya') ? 'text-primary' : 'text-gray-400' }}"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item {{ request()->is('karyawan/ubah-password') || request()->is('hrd/ubah-password') ? 'font-weight-bold text-primary' : '' }}" href="{{ Auth::user()->posisi == "HRD" ? route('ubahPasswordPage_HRD') : route('ubahPasswordPage_Karyawan') }}">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 {{ request()->is('karyawan/ubah-password') || request()->is('hrd/ubah-password') ? 'text-primary' : 'text-gray-400' }}"></i>
                                    Ubah Password
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                  @yield('konten')
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Harmoni Absensi 2022, CW-22.</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Yakin ingin Keluar dari akun?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Tekan "Logout" jika Anda siap untuk mengakhiri sesi Anda saat ini.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <a class="btn btn-primary" href="/logout">Logout</a>
                </div>
            </div>
        </div>
    </div>


    <!-- Core plugin JavaScript-->
    <script src="/Assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/Assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="/Assets/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level plugins -->
    <script src="/Assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="/Assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="/Assets/js/demo/datatables-demo.js"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>


    @yield("js")

</body>

</html>