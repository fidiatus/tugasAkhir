@extends('layouts.apps')

@section('content')
<div class="container">
  <div class="row">
      <div class="col-md-13 col-sm-13 col-xs-16">
      <div class="panel panel-default">
          <div class="panel-heading"><h4>Data Pembimbing</h4></div>
          
    <div class="panel-body">

      <div class="panel-body">
        <a class="btn btn-success" href="{{ route('pembimbing.setpdf',[$bidangpkl,$prodi]) }}"><i class="fa fa-download"></i> Report PDF</a>
        </form>
      </div>
      <div class="well clearfix">
	      <table id="datatable" class="table table-striped table-bordered">
			<thead>
		        <tr> 
		          <th> No </th>
		          <th> NIM </th> 
		          <th> Nama Mahasiswa</th>
		          <th> Bidang PKL </th>
		          <th> Prodi </th>
		          <th> Tahun Ajaran</th>
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
		        	<td>{{$pembimbing->nama_proyek}}</td>
		        	<td>{{$pembimbing->tahun_ajaran}}</td>
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
 </div>
@endsection