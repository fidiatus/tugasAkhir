@extends('layout.default')

@section('content')
<div class="container">
 <div class="row">
  <div class="col-md-13 col-sm-13 col-xs-16">
    <div class="x_panel">
      <div class="x_title">
        <h2>Insert Data Grup</h2>
          <div class="clearfix"></div>
      </div>
    @if (!Auth::user()->roles()->first()->name == "Mahasiswa")
          <div class="pull-right">
              <a class="btn btn-primary" href="{{ route('grup.index') }}"> Back</a>
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
             {!!Form::select('user_id', $user, 'S');!!} 
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