@extends('layouts.app')

@section('content')
<div class="container">
 <div class="row">
      <div class="col-md-13 col-sm-13 col-xs-16">
      <div class="panel panel-default">
          <div class="panel-heading"><h4>Dosen Management</h4></div>
          
    <div class="panel-body">
    @if (!Auth::user()->roles()->first()->name == "Kaprodi" )
          <div class="panel-body">
              <a class="btn btn-primary" href="{{ route('dosen.index') }}"> Back</a>
          </div>
    @endif
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
  {!! Form::open(array('route' => 'dosen.store','method'=>'POST')) !!}
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>NIP :</strong>
                {!! Form::text('nip', null, array('placeholder' => 'NIP','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Nama :</strong>
                {!! Form::text('nama', null, array('placeholder' => 'Nama','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Bidang :</strong>
             {!!Form::select('bidang_id', $bidang, 'S');!!} 
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