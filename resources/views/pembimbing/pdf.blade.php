<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Report Data Pembimbing</title>
    <body>
      <style type="text/css">
        .tg  {border-collapse:collapse;border-spacing:0;border-color:#ccc;width: 100%; }
        .tg td{font-family:Arial;font-size:12px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#fff;}
        .tg th{font-family:Arial;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#f0f0f0;}
        .tg .tg-3wr7{font-weight:bold;font-size:12px;font-family:"Arial", Helvetica, sans-serif !important;;text-align:center}
        .tg .tg-ti5e{font-size:10px;font-family:"Arial", Helvetica, sans-serif !important;;text-align:center}
        .tg .tg-rv4w{font-size:10px;font-family:"Arial", Helvetica, sans-serif !important;}
      </style>
  
		<div style="font-family:Arial; font-size:12px;">

        @foreach($data as $pembimbing)
            <center><div style="font-family:Arial; font-size:12px;"><h2> Daftar Nama Pembimbing Praktek Kerja Lapangan Bidang ( {{ $pembimbing-> bidangpkl->bidang_pkl }} )</h2>
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
			<td>{{ ++$i}}</td>
			<td>{{$pembimbing->nim}}</td>
            <td>{{$pembimbing->nama_mhs}}</td>
            <td>{{$pembimbing->perusahaan_id}} pada {{$pembimbing->daftarpkls->nama_proyek}}</td>
            <td>{{$pembimbing->dosen->nama_dosen}}</td>
		</tr>
		@endforeach
		</tbody>
		</thead>
	</table>
<br/><br/>
<div class="pull-left" align="pull-left"> 
    <p>Padang, </p>
    <br/><br/>
    <p>Koord.Prodi {{$pembimbing->prodi->prodi}</p>
    <p>NIM.1401092001</p>
</div>
</body>
</html>