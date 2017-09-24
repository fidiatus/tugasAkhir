@extends('layouts.apps')

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="x_panel">
      <div class="x_title">
        <h2> Data Report Data Praktek Kerja Lapangan Jurusan Teknik Sipil</h2>
        <div class="clearfix"></div>
      </div>

      <div class="panel-body">
        <div class="row">
          <div class="col-md-12 col-xs-12 col-md-12">
        <a class="btn btn-success" href="{{ route('daftarpkl.setpdfperusahaan',[$th]) }}"><i class="fa fa-download"></i> Report PDF</a>
      <div class="well clearfix">
	      <table id="datatable" class="table table-striped table-bordered">
			<thead>
		        <tr> 
		          <th> No </th>
		          <th> NIM </th> 
		          <th> Nama Mahasiswa</th>
		          <th> Proyek </th>
		        </tr>
		      </thead>
		      <tbody>
				@foreach($daftarpkl as $daftarpkl)
		        <tr>
		        	<td> # </td>
		        	<td>{{$daftarpkl->nim}}</td>
				 	<td>{{$daftarpkl->nama_mhs}}</td>
		        	<td>{{$daftarpkl->nama_proyek}} pada {{$daftarpkl->namper}}</td>
		        </tr>		
				@endforeach
		      </tbody>		
		    </table>
		  </div>
	    </div>
	  </div>
    </div>
  </div>
 </div>
</div>
@endsection