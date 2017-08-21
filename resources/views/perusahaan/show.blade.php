@extends('layout.default')

@section('content')
<div class="container">
<div class="row">
  <div class="col-md-13 col-sm-13 col-xs-16">
    <div class="x_panel">
      <div class="x_title">
        <h2>Show Data Perusahaan</h2>
          <div class="clearfix"></div>
      </div>
      <div class="x_content">
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
@endsection