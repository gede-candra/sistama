@extends('layouts.Main')

@section('konten')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Absensi Karyawan Magang</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 gap-2 d-flex flex-md-row flex-column justify-content-between align-items-md-center" style="gap: 15px">
            <h6 class="m-0 font-weight-bold text-primary">Data Absensi Karyawan Magang CV Harmoni Permata</h6>
            <div class="d-flex">
                @canany(['isAdmin', 'isStaff'])
                    <a href="{{ route('dataAbsensi.export') }}" class="btn btn-sm btn-outline-primary shadow-sm ml-md-2"><i class="fas fa-download fa-sm"></i> Generate Report</a>
                @endcanany
                {{-- @elsecanany(['isIntern'])
                <form action="" id="formAbsensi">
                    @csrf
                        @if ($user->attendances->last() == null || $user->attendances->last()->tgl_kerja != $waktu)
                        <input type="hidden" value="" id="id_absen">
                        <button type="submit" class="d-sm-inline-block btn btn-sm btn-outline-primary shadow-sm ml-2"><i class="fa-solid fa-hand-holding-heart"></i> Absen Kedatangan</button>
                    @else
                        @if ($user->attendances->last()->jam_keluar == null)
                            <input type="hidden" value="{{ $user->attendances->last()->id }}" id="id_absen">
                            <button type="submit" class="d-sm-inline-block btn btn-sm btn-outline-warning shadow-sm ml-2"><i class="fa-solid fa-hand-holding-heart"></i> Absen Kepulangan</button>
                        @else
                            <span class="text-success d-flex text-center">Anda Sudah Absen Hari Ini</span>
                        @endif
                    @endif
                </form>
                @endcanany --}}
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Karyawan Magang</th>
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
    <input type="hidden" id="url-get" value="{{ route("dataAbsensi.datatable") }}">
@endsection

@section('js')
    {{-- @canany(['isAdmin', 'isStaff']) --}}
        <script src="{{ asset('assets/js/dataabsensi.js') }}"></script>
    {{-- @elsecanany(['isIntern'])
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="{{ asset('assets/js/absensimagang.js') }}"></script>
    @endcanany --}}

@endsection
