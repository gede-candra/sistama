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
      confirmButtonColor: '#3085d6',
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
            Swal.fire({
               position: 'top',
               title: 'Sukses!',
               text: data.response,
               icon: 'success',
            })
         }).fail(function (data) {
               if (data.responseJSON.errors != null) {
                  $("#name_error").html("")
                  $("#email_error").html("")
                  $("#name_error").html(data.responseJSON.errors.name)
                  $("#email_error").html(data.responseJSON.errors.email)
               } else {
                  Swal.fire({
                     position: 'top',
                     title: 'Gagal Mengedi Profil!',
                     text: "Silahkan coba lagi atau hubungi bagian admin untuk keterangan lebih lanjut.",
                     icon: 'error',
                  })
               }
         })
      }
  })

});