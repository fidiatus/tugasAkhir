<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Report Data Pembimbing</title>
    <body>
	
	<div style="font-family:Arial; font-size:12px;">
	<center><div style="font-family:Arial; font-size:12px;">
	<h2> Daftar Nama mahasiswa bimbingan Praktek Kerja Lapangan</h2>
	<h2> Jurusan Teknik Sipil Politeknik Negeri Padang</h2>
</div></center>
<?php
	$i=0
?>
		<h4> Nama Dosen : {{$nama_dosen}} </h4>
	      <table border="1">
			<thead>
		        <tr> 
					<th> No </th>
					<th> Nama Mahasiswa</th>
					<th> Program Studi </th>
				</tr>
			</thead>
			@foreach($pembimbing as $key=>$pembimbing)
			<tbody>
				<tr>
					<td>{{$i=$i+1}}</td>
					<td>{{$pembimbing->nama_mhs}}</td>
					<td>{{$pembimbing->prod}}</td>
				</tr>
			@endforeach
			 </tbody>		
		    </table>
		    </center>
		<br/>
	<br/>
  </body>
</html>

