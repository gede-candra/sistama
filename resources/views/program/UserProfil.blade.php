@extends('layouts.Main')

@section('konten')
   <!-- Page Heading -->
   <h1 class="h4 mb-2 text-gray-800 text-center" style="font-family: aclonica">Profil Saya</h1>

   <form action="" id="formProfil">
      {{-- Profile image --}}
      <div class="row mb-4 mx-lg-5 p-3">
         <div class="col-12 col-sm-6 shadow card m-auto">
               <div class="p-3 d-flex flex-column align-items-center justify-content-between" style="gap: 20px">
               <div class="w-px-150 h-px-150 rounded-pill overflow-hidden shadow-sm"><img id="image-profile" data-url="{{ url('uploads/images/user-profile') }}" class="secondary-bg w-100 h-100" src="{{ auth()->user()->picture ? url('uploads/images/user-profile/'.auth()->user()->picture) : asset('assets/img/undraw_profile_2.svg') }}" alt=""></div>
               <div class="w-100">
                  <label class="w-100 btn btn-primary" for="edit-profile-image"><i class="fas fa-edit fa-sm"></i> Ubah Foto Profil</label>
                  <input type="file" name="picture" id="edit-profile-image" accept="image/png,image/jpg,image/jpeg" hidden>
                  <span id="image_error" class="error"></span><br>
                  <span id="image_format_error" class="error"></span>
               </div>
            </div>
         </div>
      </div>

      <!-- Biodata -->
      <div class="card shadow mb-4 mx-lg-5 m-auto">
         <div class="card-body py-3">
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
               <button type="submit" class="btn btn-primary w-100 shadow"><i class="fas fa-user-edit fa-sm"></i> Edit Profil</button>
            </div>
         </div>
      </div>
   </form>
   <input type="hidden" id="url-get" value="{{ route('profile.update') }}">
@endsection

@section('js')
   <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   <script src="{{ asset('assets/js/profiluser.js') }}"></script>
@endsection
