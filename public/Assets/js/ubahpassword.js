// Fungsi submit form 
$("#formUbahPassword").submit(function(e) {
   e.preventDefault();

   let formData = new FormData(this);
   let route = $("#url-get").val();

   Swal.fire({
      position: 'top',
      title: 'Apakah anda yakin ingin password anda?',
      icon: 'question',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, Ubah Password!'
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
            $("#pass_lama_error").html("")
            $("#pass_baru_error").html("")
            $("#konfirmasi_pass_baru_error").html("")
            if (data.error_pass_lama != null) {
               $("#pass_lama_error").html(data.error_pass_lama)
            } else if (data.error_pass_baru != null){
               $("#pass_baru_error").html(data.error_pass_baru)
            } else if (data.error_konfir_pass != null){
               $("#konfirmasi_pass_baru_error").html(data.error_konfir_pass)
            } else{
               $("#inputPassLama").val("")
               $("#inputPassBaru").val("")
               $("#inputKonPassBaru").val("")
               Swal.fire({
                  position: 'top',
                  title: 'Sukses!',
                  text: data.response,
                  icon: 'success',
               })
            }
         }).fail(function (data) {
               if (data.responseJSON.errors != null) {
                  $("#pass_lama_error").html("")
                  $("#pass_baru_error").html("")
                  $("#konfirmasi_pass_baru_error").html("")
                  $("#pass_lama_error").html(data.responseJSON.errors.pass_lama)
                  $("#pass_baru_error").html(data.responseJSON.errors.pass_baru)
                  $("#konfirmasi_pass_baru_error").html(data.responseJSON.errors.konfirmasi_pass_baru)
                  console.log(data);
               } else {
                  Swal.fire({
                     position: 'top',
                     title: 'Gagal Mengubah Password!',
                     text: "Silahkan coba lagi atau hubungi bagian admin untuk keterangan lebih lanjut.",
                     icon: 'error',
                  })
                  console.log(data);
               }
         })
      }
  })

});