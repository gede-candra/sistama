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
               <div class="col-md-6 position-relative">
                  <input type="password" class="form-control " id="inputPassLama" name="pass_lama" style="padding-right: 34px;">
                  <button type="button" class="position-absolute top-6 right-15 border-0 bg-transparent show-password"><i class="fas fa-eye text-secondary"></i></button>
                  <button type="button" class="position-absolute top-6 right-15 border-0 bg-transparent hide-password" style="display: none;"><i class="fas fa-eye text-primary"></i></button>
                  <span id="pass_lama_error" class="error"></span>
               </div>
            </div>
            <div class="form-group row">
               <label for="inputPassBaru" class="col-md-5 col-form-label">Password Baru <span class="d-md-none">:</span></label>
               <label for="inputPassBaru" class="d-none d-md-block col-md-1 col-form-label">:</label>
               <div class="col-md-6">
                  <input type="password" class="form-control" id="inputPassBaru" name="pass_baru" style="padding-right: 34px;">
                  <button type="button" class="position-absolute top-6 right-15 border-0 bg-transparent show-password"><i class="fas fa-eye text-secondary"></i></button>
                  <button type="button" class="position-absolute top-6 right-15 border-0 bg-transparent hide-password" style="display: none;"><i class="fas fa-eye text-primary"></i></button>
                  <span id="pass_baru_error" class="error"></span>
               </div>
            </div>
            <div class="form-group row">
               <label for="inputKonPassBaru" class="col-md-5 col-form-label">Konfirmasi Password Baru <span class="d-md-none">:</span></label>
               <label for="inputKonPassBaru" class="d-none d-md-block col-md-1 col-form-label">:</label>
               <div class="col-md-6">
                  <input type="password" class="form-control" id="inputKonPassBaru" name="konfirmasi_pass_baru" style="padding-right: 34px;">
                  <button type="button" class="position-absolute top-6 right-15 border-0 bg-transparent show-password"><i class="fas fa-eye text-secondary"></i></button>
                  <button type="button" class="position-absolute top-6 right-15 border-0 bg-transparent hide-password" style="display: none;"><i class="fas fa-eye text-primary"></i></button>
                  <span id="konfirmasi_pass_baru_error" class="error"></span>
               </div>
            </div>
            <div class="form-group mt-5 d-lg-flex ">
            <button type="submit" class="btn btn-primary w-100 shadow"><i class="fas fa-key fa-sm"></i> <b>Ubah Password</b></button>
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
