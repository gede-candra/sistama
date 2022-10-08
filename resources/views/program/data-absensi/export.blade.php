<table>
   <thead>
      <tr>
         <th colspan="5" rowspan="2" style="border: 1px solid black; text-align: center;">Data Absensi Karyawan Magang <br style="mso-data-placement:same-cell;"> CV. Harmoni Permata</th>
      </tr>
      <tr></tr>
      <tr>
         <th style="border: 1px solid black; background-color: #4cb8c4; color: white;">Nama Karyawan Magang</th>
         <th style="border: 1px solid black; background-color: #4cb8c4; color: white;">Waktu Kedatangan</th>
         <th style="border: 1px solid black; background-color: #4cb8c4; color: white;">Waktu Pulang</th>
         <th style="border: 1px solid black; background-color: #4cb8c4; color: white;">Tanggal</th>
         <th style="border: 1px solid black; background-color: #4cb8c4; color: white;">Keterangan</th>
      </tr>
   </thead>
   <tbody>
   @foreach($attendances as $item)
      <tr>
         <td style="border: 1px solid black;">{{ $item->users->name }}</td>
         <td style="border: 1px solid black;">{{ $item->addmission_time }}</td>
         <td style="border: 1px solid black;">{{ $item->time_out }}</td>
         <td style="border: 1px solid black;">{{ $item->work_date }}</td>
         <td style="border: 1px solid black;">{{ ($item->addmission_time != "" && $item->time_out != "") ? "Hadir" : "Belum Pulang" }}</td>
      </tr>
   @endforeach
   </tbody>
</table>