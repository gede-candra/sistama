@extends('.Harmoni_Absensi.layouts.Main')

@section('konten')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Absensi Karyawan</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Data Absensi Karyawan CV Harmoni Permata</h6>
            <div class="d-flex">
                <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-outline-primary shadow-sm ml-2"><i class="fas fa-download fa-sm"></i> Generate Report</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Karyawan</th>
                            <th>Jam Masuk</th>
                            <th>Jam keluar</th>
                            <th>Tanggal</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>

                </table>
            </div>
        </div>
    </div>
    <input type="hidden" id="url-get" value="{{ route("absensi_datatables") }}">
@endsection

@section('js')
    <script src="/Assets/js/dataabsensi.js"></script>
@endsection
