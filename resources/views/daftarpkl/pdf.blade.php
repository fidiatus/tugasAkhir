<div class="pull-center" align="center"><h2> Report Data Booking Hotel Sunset</h2>
</div><br/>
    <table border="1">
        <thead>                
          <tr> 
			<th>Tanggal Booking</th>
			<th>ID Pelanggan</th>
			<th>Nomor kamar</th>
			<th>Lama</th>
		</tr>
		<tbody>
		@foreach($booking as $booking)
		<tr>
			<td>{{$booking->tgl_booking}}</a></td>
            <td>{{$booking->pelanggan->id_pelanggan}}</td>
            <td>{{$booking->kamar->no_kamar}}</td>
            <td>{{$booking->lama}}</td>
		</tr>
		@endforeach
		</tbody>
		</thead>
	</table>
<br/><br/>
<div class="pull-left" align="pull-left"> 
    <p>Padang, 08 Agustus 2017</p>
    <br/><br/>
    <p>Fidiatus Sakinah</p>
    <p>NIM.1401092001</p>
</div>