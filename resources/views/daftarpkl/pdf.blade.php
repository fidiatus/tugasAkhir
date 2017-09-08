<!DOCTYPE html>
<html>
<head>
<body style="font-size: 14px;">
  <div class="container">
    <div class="header">
      <table style="width: 100%">
        <tr>
          <td style="text-align: center">
            <p> <h4> DAFTAR NAMA PEMBIMBING PRAKTEK KERJA LAPANGAN (BIDANG {{$daftarpkl->bidangpkl->bidang_pkl}}) </h4>
                <h4> MAHASISWA PROGRAM STUDI {{$daftarpk->prodi->prodi}} semester {{$daftarpkl->semester}} </h4>
                <h4> JURUSAN TEKNIK SIPIL POLITEKNIK NEGERI PADANG</h4></p>
                </tr>
      </table>
    </div>
    <div>
      <table style="border-spacing: 0; border-collapse: collapse; width: 100%;">
        <tr style="border:1px solid #000000; font-size: 12px;">
          <th rowspan="2" width="50px" style="border:1px solid #000000; font-size: 12px;"><b> Nama Mahasiswa </b></th>
          <th rowspan="2" width="270px" style="border:1px solid #000000; font-size: 12px;"><b> NO BP </b></th>
          <th rowspan="2" width="80px" style="border:1px solid #000000; font-size: 12px;"><b> Proyek Tempat PKL </b></th>
        </tr>
	@foreach($daftarpkl as $daftarpkl)
		<tr style="border:1px solid #000000;">
	      <td align="center" width="50px" style="border:1px solid #000000; font-size: 11px;"> {{$daftarpkl->nama_mhs}} </td>
	      <td width="200px" style="border:1px solid #000000; font-size: 11px;"> {{$daftarpkl->nim}} </td>
	      <td align="center" width="80px" style="border:1px solid #000000; font-size: 11px;"> {{$daftarpkl->nama_proyek}} </td>
        </tr>
	@endforeach
		</tbody>
	</table>
</body>
</html>