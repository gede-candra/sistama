@extends('.Harmoni_Absensi.layouts.Main')

@section('konten')
   <!-- Page Heading -->
   <h1 class="h4 mb-2 text-gray-800 text-center" style="font-family: aclonica">Profil Saya</h1>

   <!-- DataTales Example -->
   <div class="card shadow mb-4 w-75 m-auto">
      <div class="card-body py-3">
         <form action="" id="formProfil">
            <input type="hidden" id="id_user" value="{{ $userAuth->id }}" name="id_user">
               <div class="form-group row">
                  <label for="inputNama" class="col-sm-3 col-form-label">Nama Lengkap <span class="d-lg-none">:</span></label>
                  <label for="inputNama" class="d-none d-lg-block col-sm-1 col-form-label">:</label>
                  <div class="col-sm-8">
                     <input type="text" class="form-control" id="inputNama" value="{{ $userAuth->name }}" name="name">
                     <span id="name_error" class="error"></span>
                  </div>
               </div>
               <div class="form-group row">
                  <label for="inputEmail" class="col-sm-3 col-form-label">Email <span class="d-lg-none">:</span></label>
                  <label for="inputEmail" class="d-none d-lg-block col-sm-1 col-form-label">:</label>
                  <div class="col-sm-8">
                     <input type="email" class="form-control" id="inputEmail" value="{{ $userAuth->email }}" name="email">
                     <span id="email_error" class="error"></span>
                  </div>
               </div>
               <div class="form-group row">
                  <label for="inputPosisi" class="col-sm-3 col-form-label">Posisi <span class="d-lg-none">:</span></label>
                  <label for="inputPosisi" class="d-none d-lg-block col-sm-1 col-form-label">:</label>
                  <div class="col-sm-8">
                     <input type="text" readonly class="form-control-plaintext" style="outline: 0;" id="inputPosisi" value="{{ $userAuth->posisi }}">
                  </div>
               </div>
               <div class="form-group mt-5 d-lg-flex ">
                  <button type="submit" class="btn btn-outline-warning w-100 shadow">Edit Profil</button>
               </div>
         </form>
      </div>
   </div>
   <input type="hidden" id="url-get" value="{{ Auth::user()->posisi == "HRD" ? route('editProfilUser_HRD') : route('editProfilUser_Karyawan')}}">
@endsection

@section('js')
   <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   <script src="/Assets/js/profiluser.js"></script>
@endsection
