@extends('layouts.apps')

@section('content')
<div class="container">
 <div class="row">
      <div class="col-md-13 col-sm-13 col-xs-16">
      <div class="panel panel-default">
          <div class="panel-heading"><h4>Grup Praktek Kerja Lapangan</h4></div>
          
    <div class="panel-body">
      <div class="panel-body">
          <a class="btn btn-primary" href="{{ route('grup.index') }}"> Back</a>
      </div>
  {!! Form::open(array('route' => 'grup.store','method'=>'POST')) !!}
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Prodi :</strong>  
             {!!Form::select('prodi_id', $prodi, 'S');!!} 
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Nama Mahasiswa :</strong>  
             {!!Form::select('user_id', $users, 'S');!!} 
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