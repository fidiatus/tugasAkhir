@extends('layouts.apps')

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="x_panel">
      <div class="x_title">
        <h2> Data Report Data Pembimbing Jurusan Teknik Sipil</h2>
        <div class="clearfix"></div>
      </div>

      <div class="panel-body">
        <div class="row">
          <div class="col-md-12 col-xs-12 col-md-12">
        <a class="btn btn-success" href="{{ route('pembimbing.setpdf',[$bidangpkl,$prodi,$mahasiswa,$daftarpkl]) }}"><i class="fa fa-download"></i> Report PDF</a>
      <div class="well clearfix">
	      <table id="datatable" class="table table-striped table-bordered">
			<thead>
		        <tr> 
		          <th> No </th>
		          <th> NIM </th> 
		          <th> Nama Mahasiswa</th>
		          <th> Bidang PKL </th>
		          <th> Prodi </th>
		          <th> Proyek PKL </th>
		          <th> Nama Dosen </th>
		        </tr>
		      </thead>
				@foreach($pembimbing as $pembimbing)
		      <tbody>
		        <tr>
		        	<td> # </td>
		        	<td>{{$pembimbing->nim}}</td>
				 	<td>{{$pembimbing->nama_mhs}}</td>
		        	<td>{{$pembimbing->bidpkl}}</td>
				 	<td>{{$pembimbing->prod}}</td>
		        	<td>{{$pembimbing->nama_proyek}} pada {{$pembimbing->nama_perusahaan}}</td>
				 	<td>{{$pembimbing->namdos}}</td>					 
		        </tr>	
		      </tbody>			
				@endforeach
		    </table>
		  </div>
	    </div>
	  </div>
    </div>
  </div>
 </div></div>
@endsection