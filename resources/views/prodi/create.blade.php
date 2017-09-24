@extends('layouts.apps')

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="x_panel">
      <div class="x_title">
        <h2> Data Prodi Jurusan Teknik Sipil</h2>
        <div class="clearfix"></div>
      </div>

      <div class="panel-body">
        <div class="row">
          <div class="col-md-12 col-xs-12 col-md-12">
          <div class="panel-body">
              <a class="btn btn-primary" href="{{ route('prodi.index') }}"> Back</a>
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
  {!! Form::open(array('route' => 'prodi.store','method'=>'POST')) !!}
      <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama Program Studi:</strong>
                    {!! Form::text('prodi', null, array('placeholder' => 'Prodi','class' => 'form-control')) !!}
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