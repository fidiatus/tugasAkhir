	<center><div style="font-family:Arial; font-size:12px;">
	<h2> Daftar Nama Pembimbing Praktek Kerja Lapangan Bidang {{$bidangpkl->bidang_pkl}}</h2>
	<h2> Mahasiswa Program Studi {{$prodi->prodi}} TA. <?php 
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
		        	<td>{{$pembimbing->nama_proyek}}</td>
				 	<td>{{$pembimbing->namdos}}</td>					 
		        </tr>		
				@endforeach
		      </tbody>		
		    </table>


