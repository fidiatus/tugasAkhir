@extends('layout.default')

@section('content')
<div class="container">
<div class="row">
  <div class="col-md-13 col-sm-13 col-xs-16">
    <div class="x_panel">
      <div class="x_title">
        <h2>Edit Data Perusahaan</h2>
          <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <a class="btn btn-primary" href="{{ route('perusahaan.index') }}"> Back</a>
      </div>
	@if (count($errors) > 0)
        <div class="alert alert-danger">
        	<strong>Whoops!</strong> There were some problems with your input.<br><br>
        	<ul>
        		@foreach ($errors->all() as $error)
        			<li>{{ $error }}</li>
        		@endforeach
        	</ul>
        </div>
	@endif
	{!! Form::model($perusahaan, ['method' => 'patch','route' => ['perusahaan.update', $perusahaan->id]]) !!}
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Perusahaan:</strong>
                {!! Form::text('nama_perusahaan', null, array('placeholder' => 'Nama Perusahaan','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Telp:</strong>
                {!! Form::text('telepon', null, array('placeholder' => 'Telp','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Alamat:</strong>
                {!! Form::text('alamat', null, array('placeholder' => 'Alamat','class' => 'form-control')) !!}
            </div>
        </div>
    	<div class="col-xs-12 col-sm-12 col-md-12 text-center">
    				<button type="submit" class="btn btn-primary">Submit</button>
        </div>
	</div>
	{!! Form::close() !!}
	</div>
	</div>
	</div>
    </div>
@endsection