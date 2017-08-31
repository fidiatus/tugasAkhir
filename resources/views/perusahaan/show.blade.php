@extends('layouts.apps')

@section('content')
<div class="container">
<div class="row">
      <div class="col-md-13 col-sm-13 col-xs-16">
      <div class="panel panel-default">
          <div class="panel-heading"><h4>Perusahaan Management</h4></div>
          
        <div class="panel-body">
          <div class="panel-body">
        <a class="btn btn-primary" href="{{ route('perusahaan.edit',$perusahaan->id) }}">Edit</a>
        <a class="btn btn-primary" href="{{ route('perusahaan.index') }}"> Back</a>
      </div>
	{!! Form::model($perusahaan, ['method' => 'patch','route' => ['perusahaan.update', $perusahaan->id]]) !!}
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Perusahaan:</strong>
                <input type="text" class="form-control" readonly="readonly" placeholder="{{ $perusahaan->nama_perusahaan }}">                
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                <input type="text" class="form-control" readonly="readonly" placeholder="{{ $perusahaan->email }}">                 
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Telp:</strong>
                <input type="text" class="form-control" readonly="readonly" placeholder="{{ $perusahaan->telepon }}">                 
            </div>
        </div>
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Alamat:</strong>
                <input type="text" class="form-control" readonly="readonly" placeholder="{{ $perusahaan->alamat }}">                 
            </div>
        </div>
	</div>
	{!! Form::close() !!}
	   </div>
	</div>
  </div>
  </div>
</div>
@endsection