<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SISTAMA | Absensi jadi lebih mudah dengan SISTAMA</title>
    {{-- Icon --}}
    <link rel="icon" type="image/*" href="{{ asset('Assets/img/sistama_logo.png') }}">

    <!-- Custom fonts for this template-->
    <link href="{{ asset('Assets/vendor/fontawesome-free-6.1.1-web/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('Assets/css/sb-admin-2.css') }}" rel="stylesheet">
    <link href="{{ asset('Assets/css/auth.css') }}" rel="stylesheet">
    <link href="{{ asset('Assets/css/validasi.css') }}" rel="stylesheet">

</head>

<body  id="your-element-selector" style="height: 100vh">

    <div class="d-flex flex-column justify-content-center align-items-start p-5 h-100 text-white">
        <div class="d-flex align-items-center">
            <img class="bg-white mr-3 rounded-pill p-1" src="{{ asset('Assets/img/sistama_logo.png') }}" alt="" width="100">
            <h1 class="m-0 font-weight-bolder">S I S T A M A</h1>
        </div>
        <div class="d-flex align-items-center" style="height: 80px;"><h2 class="m-0" id="element"></h2></div>
        <div class="row w-100 mt-3 border-2 border-top pt-3" style="max-width: 450px">
            <div class="col-6">
                <button onclick="login()" class="btn btn-one mr-3">
                    <span>Login</span>
                </button>
            </div>
            <div class="col-6">
                <button onclick="register()" class="btn btn-one">
                    <span>Register</span>
                </button>
            </div>
        </div>

        <div style="position: absolute; bottom: 0; font-size: 14px; opacity: 0.5;"><center><p>©️ SISTAMA 2022 | All Rights Reserved.</p></center></div>
    </div>

   <!-- Modal -->
<div class="modal fade" id="AuthModal" tabindex="-1" aria-labelledby="AuthModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="AuthModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" id="formAuth">
                @csrf
                <!-- Name input -->
                <input type="hidden" id="route" class="form-control" name="route" value="login" />
                <!-- Name input -->
                <div id="namalengkap" class="form-outline mb-4">
                    <label class="form-label" for="name">Nama Lengkap</label>
                    <input type="text" id="name" class="form-control" name="name" />
                    <span id="name_error" class="error">Lorem ipsum dolor sit amet.</span>
                </div>
                
                <!-- Email input -->
                <div class="form-outline mb-4">
                    <label class="form-label" for="email">Alamat Email</label>
                    <input type="email" id="email" class="form-control" name="email" />
                    <span id="email_error" class="error">Lorem ipsum dolor sit amet.</span>
                </div>
                
                <!-- Password input -->
                <div class="form-outline mb-4" id="passInput">
                    <label class="form-label" for="password">Password</label>
                    <input type="password" id="password" class="form-control" name="password" />
                    <span id="password_error" class="error">Lorem ipsum dolor sit amet.</span>
                </div>
                
                <!-- Submit button -->
                <div class="form-outline mb-4" id="passInput">
                    <button id="btn-form" type="submit" class="btn btn-primary mb-4 w-100 m-0">Login</button>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>

   <!-- Bootstrap core JavaScript-->
   <script src="{{ asset('Assets/vendor/jquery/jquery.min.js') }}"></script>
   <script src="{{ asset('Assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

   <!-- Core plugin JavaScript-->
   <script src="{{ asset('Assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

   <!-- Custom scripts for all pages-->
   <script src="{{ asset('Assets/js/sb-admin-2.min.js') }}"></script>

   {{-- Vanta js  --}}
   <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r121/three.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vanta@0.5.22/dist/vanta.halo.min.js"></script>
    <script src="{{ asset('Assets/js/vanta.js') }}"></script>

    {{-- Typed Js  --}}
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
    <script src="{{ asset('Assets/js/typed.js') }}"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('Assets/js/auth.js') }}"></script>
</body>

</html>