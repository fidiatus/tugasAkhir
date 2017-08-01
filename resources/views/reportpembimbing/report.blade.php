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
	 ?> </h2> </div>
		   </center>
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
		   <table style="border-spacing: 0; border-collapse: collapse; width: 100%">
		   	<th style="height: 150px;border:0px solid #000000;font-size: 10px;text-align: left;" colspan="30">
		   		<br><br><br><p> Disetujui oleh :</p>
		   		<p> Ketua Jurusan Teknik Sipil</p>
		   			<p></p>
		   			<br><br><br><br>
		   			<p>.........................</p>
		   			<h4>NIP.</h4>
		   	</th>

		   <th style="height: 150px;border:0px solid #000000;font-size: 10px;text-align: left;" colspan="10">
		   		<br><br><br><p>Padang, </p>
		   		<p>Koord. Prodi {{$prodi->prodi}} </p>
		   			<p></p>
		   			<br><br><br><br>
		   			<p>.........................</p>
		   			<h4>NIP.</h4>
		   	</th>
		   </tr>
		</table>
		<br/>
	<br/>
  </body>
</html>


