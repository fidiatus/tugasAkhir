<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Report Data Pembimbing</title>
    <body>
	
	<div style="font-family:Arial; font-size:12px;">
	<center><div style="font-family:Arial; font-size:12px;">
	<h2> Daftar Nama Pembimbing Praktek Kerja Lapangan Bidang {{$bidangpkl->bidang_pkl}}</h2>
	<h2> Mahasiswa Program Studi {{$prodi->prodi}} Semester Ganjil</h2>
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
	    <center>
	      <table border="1">
			<thead>
		        <tr> 
		          <th> No </th>
		          <th> NIM </th> 
		          <th> Nama Mahasiswa</th>
		          <th> Nama Proyek</th>
		          <th> Nama Dosen </th>
		        </tr>
		      </thead>
		      <tbody>
				@foreach($pembimbing as $pembimbing)
		        <tr>
		        	<td> # </td>
		        	<td>{{$pembimbing->nim}}</td>
				 	<td>{{$pembimbing->nama_mhs}}</td>
		        	<td>{{$pembimbing->nama_proyek}} pada {{$pembimbing->nama_perusahaan}}</td>
				 	<td>{{$pembimbing->namdos}}</td>					 
		        </tr>		
				@endforeach
		      </tbody>		
		    </table>
		   </center>
		<br/>
	<br/>
  </body>
</html>


