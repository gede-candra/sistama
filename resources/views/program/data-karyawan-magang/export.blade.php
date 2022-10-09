<table>
   <thead>
      <tr>
         <th colspan="4" rowspan="2" style="border: 1px solid black; text-align: center;">Data Karyawan Magang <br style="mso-data-placement:same-cell;"> CV. Harmoni Permata</th>
      </tr>
      <tr></tr>
      <tr>
         <th style="border: 1px solid black; background-color: #4cb8c4; color: white;">No.</th>
         <th style="border: 1px solid black; background-color: #4cb8c4; color: white;">Name</th>
         <th style="border: 1px solid black; background-color: #4cb8c4; color: white;">Email</th>
         <th style="border: 1px solid black; background-color: #4cb8c4; color: white;">Posisi</th>
      </tr>
   </thead>
   <tbody>
   @foreach($users as $item)
      <tr>
         <td style="border: 1px solid black;">{{ $loop->iteration }}</td>
         <td style="border: 1px solid black;">{{ $item->name }}</td>
         <td style="border: 1px solid black;">{{ $item->email }}</td>
         <td style="border: 1px solid black;">{{ $item->roles->name }}</td>
      </tr>
   @endforeach
   </tbody>
</table>