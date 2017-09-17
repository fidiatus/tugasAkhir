<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Report Data Pembimbing</title>
    <body>
		<div style="font-family:Arial; font-size:12px;">

        @foreach($data as $pembimbing)
            <center><div style="font-family:Arial; font-size:12px;"><h2> Daftar Nama Pembimbing Praktek Kerja Lapangan Bidang ( {{ $pembimbing->bidangpkl->bidang_pkl }} )</h2>
		    <center><div style="font-family:Arial; font-size:12px;"><h2> Mahasiswa Program Studi {{ $pembimbing->prodi->prodi }} TA. {{ $pembimbing->daftarpkl->tahun_ajaran }} </h2>
		@endforeach
		<center><div style="font-family:Arial; font-size:12px;"><h2> Jurusan Teknik Sipil Politeknik Negeri Padang</h2>
		</div><br/>
    <table class="tg">
        <thead>                
          <tr> 
			<th class="tg-3wr7">No</th>
            <th class="tg-3wr7">No.BP</th>
			<th class="tg-3wr7">Nama Mahasiswa</th>
			<th class="tg-3wr7">Pembimbing</th>
		</tr>
        </thead>
		<tbody>
		@foreach($data as $key => $pembimbing)
		<tr>
			<td >{{ ++$i}}</td>
			<td class="tg-rv4w" width="40%">{{$pembimbing->nim}}</td>
            <td class="tg-rv4w" width="40%">{{$pembimbing->nama_mhs}}</td>
            <td class="tg-rv4w" width="40%">{{$pembimbing->perusahaan_id}} pada {{$pembimbing->daftarpkls->nama_proyek}}</td>
            <td class="tg-rv4w" width="40%">{{$pembimbing->dosen->nama_dosen}}</td>
		</tr>
		@endforeach
		</tbody>
		</thead>
	</table>
<br/><br/>
</body>
</html>