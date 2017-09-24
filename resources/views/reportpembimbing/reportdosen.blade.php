<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Report Data Pembimbing</title>
    <body>
	
	<div style="font-family:Arial; font-size:12px;">
	<center><div style="font-family:Arial; font-size:12px;">
	<h2> Daftar Nama Pembimbing Praktek Kerja Lapangan</h2>
	<h2> Jurusan Teknik Sipil Politeknik Negeri Padang</h2>
	<h2> Tahun Ajaran <?php 
	
	$bulan = date('m');
	$tahun = date('Y');
		if($bulan>=8 or $bulan==1){
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
		$i=0;
		?>
	    <center>
	@foreach($pembimbing as $key=>$pembimbing)
		<table>
			<th>{{$i=$i+1}}</th>
			<th>{{$pembimbing->namdos}}</th>
			<th> : </th>
			<th>{{$pembimbing->nama_mhs}}</th>
		</table>
	@endforeach
	</center>
		<br/>
	<br/>
  </body>
</html>


