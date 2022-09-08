@extends('.Harmoni_Absensi.layouts.Main')

@section('konten')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Karyawan</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Data Karyawan CV Harmoni Permata</h6>
            <div class="d-flex">
                <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" onclick="create()"><i
                        class="fas fa-plus fa-sm"></i> Tambah Data </button>
                <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-outline-primary shadow-sm ml-2"><i
                        class="fas fa-download fa-sm"></i> Generate Report</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="table" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Karyawan</th>
                            <th>Email</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="KaryawanModal" tabindex="-1" aria-labelledby="KaryawanModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="KaryawanModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="page">
                        <form method="POST" id="formTambah">
                            @csrf
                            <!-- Name input -->
                            <input type="hidden" id="id_user" class="form-control" name="id_user" />
                            <!-- Name input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="name">Nama Lengkap</label>
                                <input type="text" id="name" class="form-control" name="name" />
                                <span id="name_error" class="error">Lorem ipsum dolor sit amet.</span>
                            </div>
                            
                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="email">Alamat Email</label>
                                <input type="email" id="email" class="form-control" name="email" />
                                <span id="email_error" class="error">Lorem ipsum dolor sit amet.</span>
                            </div>
                            
                            <!-- Password input -->
                            <div class="form-outline mb-4" id="passInput">
                                <label class="form-label" for="password">Password</label>
                                <input type="password" id="password" class="form-control" name="password" />
                                <span id="password_error" class="error">Lorem ipsum dolor sit amet.</span>
                            </div>

                            <!-- Submit button -->
                            <button id="btn-form" type="submit" class="btn btn-primary btn-block mb-4">Tambah Data</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Info -->
    <div class="modal fade" id="infoModal" tabindex="-1" aria-labelledby="infoModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="infoModalLabel">Info Karyawan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <tbody>
                        <tr>
                            <td>Nama Lengkap</td>
                            <td>:</td>
                            <td id="colNama"></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td id="colEmail"></td>
                        </tr>
                        <tr>
                            <td>Posisi</td>
                            <td>:</td>
                            <td id="colPosisi"></td>
                        </tr>
                        <tr>
                            <td>Kehadiran</td>
                            <td>:</td>
                            <td id="colKehadiran"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        </div>
    </div>
    <input type="hidden" id="url-get" value="{{ route('datatables') }}">
@endsection

@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="/Assets/js/datakaryawan.js"></script>
@endsection
