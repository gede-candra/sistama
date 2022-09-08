@extends('.Harmoni_Absensi.layouts.Main')

@section('konten')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Absensi Karyawan</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Absensi Karyawan CV Harmoni Permata</h6>
            <div class="d-flex">
                <form action="" id="formAbsensi">
                    @csrf
                        @if ($user->absensis->last() == null || $user->absensis->last()->tgl_kerja != $waktu)
                        <input type="hidden" value="" id="id_absen">
                        <button type="submit" class="d-sm-inline-block btn btn-sm btn-outline-primary shadow-sm ml-2"><i class="fa-solid fa-hand-holding-heart"></i> Absen Kedatangan</button>
                    @else
                        @if ($user->absensis->last()->jam_keluar == null)
                            <input type="hidden" value="{{ $user->absensis->last()->id }}" id="id_absen">
                            <button type="submit" class="d-sm-inline-block btn btn-sm btn-outline-warning shadow-sm ml-2"><i class="fa-solid fa-hand-holding-heart"></i> Absen Kepulangan</button>
                        @else
                            <span class="text-success d-flex text-center">Anda Sudah Absen Hari Ini</span>
                        @endif
                    @endif
                </form>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Tgl Kerja</th>
                            <th>Jam Datang</th>
                            <th>Jam Pulang</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <input type="hidden" id="url-get" value="{{ route('absensi_datatables_karyawan') }}">
@endsection

@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="/Assets/js/absensikaryawan.js"></script>
@endsection
