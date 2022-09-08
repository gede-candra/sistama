@extends('.Harmoni_Absensi.layouts.Main')

@section('konten')
   <!-- Page Heading -->
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
   </div>

   <!-- Content Row -->
   <div class="row">
      @if(Auth::user()->posisi == "HRD")
      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
         <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
               <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                     <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Data Karyawan</div>
                     <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $users->count() }}</div>
                  </div>
                  <div class="col-auto">
                     <i class="fas fa-users fa-2x text-gray-300"></i>
                  </div>
               </div>
            </div>
         </div>
      </div>
      @endif
      
      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
         <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
               <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                     <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Data Absensi</div>
                     @if (Auth::user()->posisi == "HRD")
                     <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $absensis->count() }}</div>
                     @else
                     <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $absensis_karyawan->count() }}</div>
                     @endif
                  </div>
                  <div class="col-auto">
                     <i class="fa-solid fa-clipboard-list fa-2x text-gray-300"></i>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   @endsection