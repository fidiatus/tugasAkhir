@extends('layouts.apps')

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="x_panel">
      <div class="x_title">
        <h2> Ubah Data Instansi Jurusan Teknik Sipil</h2>
        <div class="clearfix"></div>
      </div>

      <div class="panel-body">
        <div class="row">
          <div class="col-md-12 col-xs-12 col-md-12">
          <div class="panel-body">
        <a class="btn btn-primary" href="{{ route('perusahaan.index') }}"> Back</a>
      </div>
	{!! Form::model($perusahaan, ['method' => 'patch','route' => ['perusahaan.update', $perusahaan->id]]) !!}
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Instansi:</strong>
                {!! Form::text('nama_perusahaan', null, array('placeholder' => 'Nama Instansi','class' => 'form-control')) !!}
                @if ($errors->has('nama_perusahaan'))
                    <span class="help-block">
                        <strong>{{ $errors->first('nama_perusahaan') }}</strong>
                    </span>
                @endif
                <br/>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
                <br/>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Telephone Instansi:</strong>
                {!! Form::text('telepon', null, array('placeholder' => 'Telp','class' => 'form-control')) !!}
                @if ($errors->has('telepon'))
                    <span class="help-block">
                        <strong>{{ $errors->first('telepon') }}</strong>
                    </span>
                @endif
                <br/>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Alamat:</strong>
                {!! Form::text('alamat', null, array('placeholder' => 'Alamat','class' => 'form-control')) !!}
                @if ($errors->has('alamat'))
                    <span class="help-block">
                        <strong>{{ $errors->first('alamat') }}</strong>
                    </span>
                @endif
                <br/>
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
    </div></div>
@endsection