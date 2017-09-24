<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Report Data Pembimbing</title>
    <body>
	
	<div style="font-family:Arial; font-size:12px;">
	<center><div style="font-family:Arial; font-size:12px;">
	<h2> Daftar Nama Perusahaan Praktek Kerja Lapangan </h2>
	<h2> Jurusan Teknik Sipil Politeknik Negeri Padang</h2>
	<h2> Tahun Ajaran <?php 
	
	$bulan = date('m');
	$tahun = date('Y');
		if($bulan>=7 or $bulan==1){
			$ta=$tahun+1;
			echo $tahun.'/'.$ta;
		}
		else{
			$ta=$tahun-1;
			// echo $bulan-1;
			echo $ta.'/'.$tahun;
		}
	 ?> </h2> 
</div></center>
<?php
	$i=0
?>
	      <table border="1">
		        <tr> 
		          <th> No </th> 
		          <th> Nama Perusahaan</th>
		          <th> Jumlah Mahasiswa Terdaftar</th>
		        </tr>
		      </thead>
		      <tbody>
				@foreach($daftarpkl as $daftarpkl)
		        <tr>
		        	<td> {{$i=$i+1}} </td>
				 	<td>{{$daftarpkl->namper}} pada {{$daftarpkl->nama_proyek}}</td>
		        	<td> Mahasiswa terdaftar berjumlah {{$daftarpkl->jumlah}} orang</td>			 
		        </tr>		
				@endforeach
		      </tbody>		
		    </table>
		<br/>
	<br/>
  </body>
</html>


