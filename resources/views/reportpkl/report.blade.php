<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Report Data Pembimbing</title>
    <body>
	
	<div style="font-family:Arial; font-size:12px;">
	<center><div style="font-family:Arial; font-size:12px;">
	<h2> Daftar Nama Praktek Kerja Lapangan Bidang {{$bidangpkl->bidang_pkl}}</h2>
	<h2> Mahasiswa Program Studi {{$prodi->prodi}} Semester Ganjil</h2>
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
	      <table border="1">
		        <tr> 
		          <th> No </th>
		          <th> NIM </th> 
		          <th> Nama Mahasiswa</th>
		          <th> Nama Proyek</th>
		          <th> Lokasi PKL </th>
		        </tr>
		      </thead>
		      <tbody>
				@foreach($daftarpkl as $daftarpkl)
		        <tr>
		        	<td> # </td>
		        	<td>{{$daftarpkl->nim}}</td>
				 	<td>{{$daftarpkl->nama_mhs}}</td>
		        	<td>{{$daftarpkl->nama_proyek}}</td>
				 	<td>{{$daftarpkl->namper}}</td>					 
		        </tr>		
				@endforeach
		      </tbody>		
		    </table>
		<br/>
	<br/>
  </body>
</html>

