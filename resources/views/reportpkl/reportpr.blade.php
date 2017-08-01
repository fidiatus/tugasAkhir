<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Report Data Pembimbing</title>
    <body>
	
	<div style="font-family:Arial; font-size:12px;">
	<center><div style="font-family:Arial; font-size:12px;">
	<h2> Daftar Nama Mahasiswa Praktek Kerja Lapangan Berdasarkan perusahaan</h2>
	<h2> Jurusan Teknik Sipil Politeknik Negeri Padang</h2>
</div></center>
<?php
	$i=0
?>
      	<h4> Nama Perusahaan : {{$nama_perusahaan}}</h4>
	      <table border="1">
		        <tr> 
		          <th> No </th> 
		          <th> NIM</th>
		          <th> Nama Mahasiswa</th>
		          <th> Program Studi </th>
		        </tr>
		      </thead>
		      <tbody>
				@foreach($daftarpkl as $daftarpkl)
		        <tr>
		        	<td> {{$i=$i+1}} </td>
				 	<td>{{$daftarpkl->nim}}</td>
		        	<td> {{$daftarpkl->nama_mhs}}</td>	
		        	<td> {{$daftarpkl->prod}}</td>		 
		        </tr>		
				@endforeach
		      </tbody>		
		    </table>
		<br/>
	<br/>
  </body>
</html>


