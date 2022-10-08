@extends('layouts.Main')

@section('konten')
   <!-- Page Heading -->
   <h1 class="h4 mb-2 text-gray-800 text-center" style="font-family: aclonica">Profil Saya</h1>

   <!-- DataTales Example -->
   <div class="card shadow mb-4 mx-lg-5 m-auto">
      <div class="card-body py-3">
         <form action="" id="formProfil">
            <input type="hidden" id="id_user" value="{{ $userAuth->id }}" name="id_user">
               <div class="form-group row">
                  <div class="col-sm-4 d-sm-flex justify-content-between">
                     <label for="inputNama" class="col-form-label">Nama Lengkap</label>
                     <label for="inputNama" class="col-form-label text-end">:</label>
                  </div>
                  <div class="col-sm-8">
                     <input type="text" class="form-control" id="inputNama" value="{{ $userAuth->name }}" name="name">
                     <span id="name_error" class="error"></span>
                  </div>
               </div>
               <div class="form-group row">
                  <div class="col-sm-4 d-sm-flex justify-content-between">
                     <label for="inputEmail" class="col-form-label">Email</label>
                     <label for="inputEmail" class="col-form-label">:</label>
                  </div>
                  <div class="col-sm-8">
                     <input type="email" class="form-control" id="inputEmail" value="{{ $userAuth->email }}" name="email">
                     <span id="email_error" class="error"></span>
                  </div>
               </div>
               <div class="form-group row">
                  <div class="col-sm-4 d-sm-flex justify-content-between">
                     <label for="inputPosisi" class="col-form-label">Posisi</label>
                     <label for="inputPosisi" class="col-form-label">:</label>
                  </div>
                  <div class="col-sm-8">
                     <input type="text" readonly class="form-control" id="inputPosisi" value="{{ $userAuth->roles->name }}">
                  </div>
               </div>
               <div class="form-group mt-5 d-lg-flex ">
                  <button type="submit" class="btn btn-outline-primary w-100 shadow">Edit Profil</button>
               </div>
         </form>
      </div>
   </div>
   <input type="hidden" id="url-get" value="{{ route('profile.update') }}">
@endsection

@section('js')
   <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   <script src="{{ asset('assets/js/profiluser.js') }}"></script>
@endsection
