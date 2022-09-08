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
      data: 'user_id',
      name: 'user_id'
   },
   {
      data: 'jam_masuk',
      name: 'jam_masuk'
   },
   {
      data: 'jam_keluar',
      name: 'jam_keluar'
   },
   {
      data: 'tgl_kerja',
      name: 'tgl_kerja',
   },
   {
      data: 'keterangan',
      name: 'keterangan'
   }],
});