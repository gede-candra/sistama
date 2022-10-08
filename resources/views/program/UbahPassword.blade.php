@extends('layouts.Main')

@section('konten')
   <!-- Page Heading -->
   <h1 class="h4 mb-2 text-gray-800 text-center" style="font-family: aclonica">Ubah Password</h1>

   <!-- DataTales Example -->
   <div class="card shadow mb-4 w-75 m-auto">
      <div class="card-body py-3">
         <form action="" id="formUbahPassword">
            <div class="form-group row">
               <label for="inputPassLama" class="col-md-5 col-form-label">Password Lama <span class="d-md-none">:</span></label>
               <label for="inputPassLama" class="d-none d-md-block col-md-1 col-form-label">:</label>
               <div class="col-md-6">
                  <input type="password" class="form-control" id="inputPassLama" name="pass_lama">
                  <span id="pass_lama_error" class="error"></span>
               </div>
            </div>
            <div class="form-group row">
               <label for="inputPassBaru" class="col-md-5 col-form-label">Password Baru <span class="d-md-none">:</span></label>
               <label for="inputPassBaru" class="d-none d-md-block col-md-1 col-form-label">:</label>
               <div class="col-md-6">
                  <input type="password" class="form-control" id="inputPassBaru" name="pass_baru">
                  <span id="pass_baru_error" class="error"></span>
               </div>
            </div>
            <div class="form-group row">
               <label for="inputKonPassBaru" class="col-md-5 col-form-label">Konfirmasi Password Baru <span class="d-md-none">:</span></label>
               <label for="inputKonPassBaru" class="d-none d-md-block col-md-1 col-form-label">:</label>
               <div class="col-md-6">
                  <input type="password" class="form-control" id="inputKonPassBaru" name="konfirmasi_pass_baru">
                  <span id="konfirmasi_pass_baru_error" class="error"></span>
               </div>
            </div>
            <div class="form-group mt-5 d-lg-flex ">
            <button type="submit" class="btn btn-outline-primary w-100 shadow">Ubah Password</button>
            </div>
         </form>
      </div>
   </div>
   <input type="hidden" id="url-get" value="{{ route('changePassword.update')}}">
@endsection

@section('js')
   <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   <script src="{{ asset('assets/js/ubahpassword.js') }}"></script>
@endsection
