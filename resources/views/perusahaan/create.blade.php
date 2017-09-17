@extends('layouts.apps')

@section('content')
<div class="container">
  <div class="row">
      <div class="col-md-13 col-sm-13 col-xs-16">
      <div class="panel panel-default">
          <div class="panel-heading"><h4>Perusahaan Management</h4></div>
          
        <div class="panel-body">
          <div class="panel-body">
        <a class="btn btn-primary" href="{{ route('perusahaan.index') }}"> Back</a>
      </div>
  {!! Form::open(array('route' => 'perusahaan.store','method'=>'POST')) !!}
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Nama Perusahaan :</strong>
                {!! Form::text('nama_perusahaan', null, array('placeholder' => 'Nama','class' => 'form-control')) !!}
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
            <strong>Email :</strong>
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
            <strong>Telephone :</strong>
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
            <strong>Alamat :</strong>
                {!! Form::textarea('alamat', null, array('placeholder' => 'Alamat','class' => 'form-control','style'=>'height:100px')) !!}
                @if ($errors->has(alamat'))
                    <span class="help-block">
                        <strong>{{ $errors->first('alamat) }}</strong>
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
  </div>
@endsection