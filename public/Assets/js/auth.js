function login() {
   $('#AuthModal').modal('show')
   $('#AuthModalLabel').html('Form Login')
   $('#btn-form').html('Login')
   
   // form 
   $("#namalengkap").addClass('d-none')
   $("#route").val("login")
   $("#posisi").addClass('d-none')
   $("#name").val("")
   $("#email").val("")
   $("#password").val("")

   // span error 
   $("#name_error").html("")
   $("#email_error").html("")
   $("#password_error").html("")
   $(".form-outline input").removeClass("error")
}
function register() {
   $('#AuthModal').modal('show')
   $('#AuthModalLabel').html('Form Register')
   $('#btn-form').html('Register')

   // form 
   $("#namalengkap").removeClass('d-none')
   $("#posisi").removeClass('d-none')
   $("#route").val("register")
   $("#name").val("")
   $("#email").val("")
   $("#password").val("")

   // span error 
   $("#name_error").html("")
   $("#email_error").html("")
   $("#password_error").html("")
   $("#posisi_error").html("")
   $(".form-outline input").removeClass("error")
}

// Fungsi Submit Form 
$("#formAuth").submit(function (e) {
   e.preventDefault();

   let formData = new FormData(this);
   let auth = $("#route").val();

   if (auth != "login") {
      var url = "/register";
   } else {
      var url = "/login";
   }
   var button = "#btn-form";
   var valButton = $(button).html();
   var loading = "<div class='spinner-border text-light' role='status' id='spinner'></div>";

   $.ajax({
      url: url,
      type: "POST",
      data: formData,
      dataType: 'json',
      contentType: false,
      processData: false,
      beforeSend: function () {
         if (button !== null) {
             $(button).empty().append(loading).prop('disabled', true).css('cursor', 'wait');
         }
      },
      complete: function () {
         if (button !== null) {
            $(button).empty().append(valButton).prop('disabled', false).css('cursor', 'auto');
         }
      }
   }).done(function (data) {
      $('#AuthModal').modal('hide')
      
      if (url == "/login") {
         // console.log("Anda Berhasil Login");
         if (data.respon == "HRD") {
            window.location = "hrd";
         }else if(data.respon == "Karyawan"){
            window.location = "karyawan";
         }else {
            Swal.fire({
               icon: 'error',
               title: 'Oops, Login Gagal!',
               text: 'Email atau Password anda mungkin salah, Silahkan coba lagi atau hubungi bagian HRD untuk keterangan lebih lanjut.',
           })
         }
      } else {
         Swal.fire({
            position: 'top',
            title: 'Sukses!',
            text: "Regristrasi Berhasil, silahkan login.",
            icon: 'success',
         })
      }
      
   }).fail(function (data) {
      if (data.responseJSON.errors != undefined) {
         if (data.responseJSON.errors != undefined) {
            $("#name_error").html("")
            $("#email_error").html("")
            $("#password_error").html("")
            $("#posisi_error").html("")
            if (auth != "login") {
               $("#name_error").html(data.responseJSON.errors.name)
            }
            $("#email_error").html(data.responseJSON.errors.email)
            $("#password_error").html(data.responseJSON.errors.password)
            $("#posisi_error").html(data.responseJSON.errors.posisi)
         }
      }else{
         $('#AuthModal').modal('hide')
         Swal.fire({
            icon: 'error',
            title: 'Oops, Kesalahan!',
            text: 'Silahkan coba lagi atau hubungi bagian admin untuk keterangan lebih lanjut.',
        })
      }
   })
});