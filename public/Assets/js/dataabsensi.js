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
      data: 'addmission_time',
      name: 'addmission_time'
   },
   {
      data: 'time_out',
      name: 'time_out'
   },
   {
      data: 'work_date',
      name: 'work_date',
   },
   {
      data: 'keterangan',
      name: 'keterangan'
   }],
});