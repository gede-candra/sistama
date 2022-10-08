function reloadTable(id) {
   var table = $(id).DataTable();
   table.cleanData;
   table.ajax.reload();
}

//Menampilkan data karyawan
$("#dataTable").DataTable({
   ordering: true,
   serverSide: true,
   processing: true,
   autoWidth: false,
   responsive: true,
   ajax: {
      'url': $("#url-get").val(),
   },

   columns: [{
      data: 'DT_RowIndex',
      name: 'DT_RowIndex',
      width: '10px',
      orderable: false,
      searchable: false
   },
   {
      data: 'work_date',
      name: 'work_date',
   },
   {
      data: 'addmission_time',
      name: 'addmission_time'
   },
   {
      data: 'time_out',
      name: 'time_out'
   },
   {
      data: 'keterangan',
      name: 'keterangan'
   }],
});


// Fungsi submit form 
$("#formAbsensi").submit(function(e) {
   e.preventDefault();

   let formData = new FormData(this);
   let id = $("#id_absen").val();

   if(id == "") {
       var url = "absensi"
       var method = "POST"
      } else {
         var url = "absensi/"+id
         var method = "PUT"
   }

   Swal.fire({
      position: 'center',
      title: 'Yakin ingin absen?',
      icon: 'question',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes'
      }).then((result) => {
      if (result.isConfirmed) {
         $.ajax({
            url: url,
            type: method,
            data: formData,
            dataType: 'json',
            contentType: false,
            processData: false,
        }).done(function(data) {
            reloadTable("#dataTable");
            console.log(data);
            if(url == "absensi"){
               $("#formAbsensi").html("<input type='hidden' value='"+data.id_absensi+"' id='id_absen'> <button type='submit' class='d-sm-inline-block btn btn-sm btn-outline-warning shadow-sm ml-2'><i class='fa-solid fa-hand-holding-heart'></i> Absen Kepulangan</button>")
            } else{
               $("#formAbsensi").html("<span class='text-success d-flex text-center'>Anda Sudah Absen Hari Ini</span>")
            }
            Swal.fire({
                position: 'top',
                title: 'Sukses!',
                text: data.response,
                icon: 'success',
            })
        }).fail(function (data) {
            
        })
      }
  })
});