@extends('layouts.Main')

@section('css')
    <link href="{{ asset('assets/vendor/select2/select2.min.css') }}" rel="stylesheet" />
@endsection

@section('konten')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Jadwal Piket Karyawan Magang</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 gap-2 d-flex flex-md-row flex-column justify-content-between align-items-md-center">
            <h6 class="m-0 font-weight-bold text-primary">Jadwal Piket Karyawan Magang CV Harmoni Permata</h6>
            <div class="d-flex">
                @canany(['isAdmin', 'isStaff'])
                    <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" id="edit-jadwal"><i
                            class="fas fa-plus fa-sm"></i> Edit Jadwal </button>
                @endcanany
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="picket-table" class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Senin</th>
                            <th>Selasa</th>
                            <th>Rabu</th>
                            <th>Kamis</th>
                            <th>Jumat</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    @include('program.picket-schedule.modal')

    <input type="hidden" id="table-url" value="{{ route('picket.datatable') }}">
    <input type="hidden" id="search-url" value="{{ route('picket.search') }}">
    <input type="hidden" id="update-url" value="{{ route('picket.update') }}">
@endsection

@section('js')
    <script src="{{ asset('assets/vendor/select2/select2.min.js') }}"></script>
    <script src="{{ asset('assets/js/picket-schedule.js') }}"></script>
@endsection
