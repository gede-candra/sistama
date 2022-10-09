// Fungsi submit form 
$("#formProfil").submit(function(e) {
   e.preventDefault();

   let formData = new FormData(this);
   let route = $("#url-get").val();

   Swal.fire({
      position: 'top',
      title: 'Apakah anda yakin ingin mengedit profil anda?',
      icon: 'question',
      showCancelButton: true,
      confirmButtonColor: '#4cb8c4',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, Edit!'
      }).then((result) => {
      if (result.isConfirmed) {
         $.ajax({
            url: route,
            type: "POST",
            data: formData,
            dataType: 'json',
            contentType: false,
            processData: false,
         }).done(function(data) {
            $("#name_error").html("")
            $("#email_error").html("")
            $("#namaUserLogin").html(data.namaUser)
            $('#image-user-profile').attr('src', $('#image-profile').data('url')+'/'+data.fotoUser);
            Swal.fire({
               position: 'top',
               title: 'Sukses!',
               text: data.response,
               icon: 'success',
               confirmButtonColor: '#4cb8c4',
            })
         }).fail(function (data) {
               if (data.responseJSON.errors != null) {
                  $("#name_error").html("")
                  $("#email_error").html("")
                  $("#name_error").html(data.responseJSON.errors.name)
                  $("#email_error").html(data.responseJSON.errors.email)
                  $("#image_error").html(data.responseJSON.errors.picture[1])
                  $("#image_format_error").html(data.responseJSON.errors.picture[0])
               } else {
                  Swal.fire({
                     position: 'top',
                     title: 'Gagal Mengedi Profil!',
                     text: "Silahkan coba lagi atau hubungi bagian admin untuk keterangan lebih lanjut.",
                     icon: 'error',
                     confirmButtonColor: '#4cb8c4',
                  })
               }
         })
      }
  })

});


// ubah foto profil
$("#edit-profile-image").change(function() {
   readImageURL(this);
});

function readImageURL(input) {
   if (input.files && input.files[0]) {
       var reader = new FileReader();
       reader.onload = function(e) {
           $('#image-profile').attr('src', e.target.result);
       }
       reader.readAsDataURL(input.files[0]);
   }
}