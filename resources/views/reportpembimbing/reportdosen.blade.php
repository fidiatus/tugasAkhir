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
	</div>
    </center>
		<?php
		$i=0;
		?>
		<div style="font-family:Arial; font-size:12px;">
		  <table border="1" align="center">
			<thead>
				<tr>
					<th> No </th>
					<th> Nama Pembimbing</th>
					<th> Jumlah Mahasiswa Bimbingan</th>
					<th> Program Studi </th>
				</tr>
			</thead>
			@foreach($pembimbing as $key=>$pembimbing)
			<tbody>
				<tr>
					<td>{{$i=$i+1}}</td>
					<td>{{$pembimbing->namdos}}</td>
					<td>Membimbing Mahasiswa sebanyak {{$pembimbing->jumlah}} orang</td>
					<td>{{$pembimbing->prod}}</td>
				</tr>
			</tbody>			
			@endforeach
		  </table>
	    </div>
	  <br/>
    <br/>
  </body>
</html>


