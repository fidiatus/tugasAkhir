@extends('layouts.apps')

@section('content')
<div class="container">
<div class="row">
      <div class="col-md-13 col-sm-13 col-xs-16">
      <div class="panel panel-default">
          <div class="panel-heading"><h4>Prodi Management</h4></div>
          
        <div class="panel-body">
          <div class="panel-body">
            <a class="btn btn-primary" href="{{ route('prodi.index') }}"> Back</a>
      </div>
	{!! Form::model($prodi, ['method' => 'patch', 'route' => ['prodi.update', $prodi->id]]) !!}
	<div class="row">
		<label class="col-md-4">Nama Program Studi</label>
		<input class="form-control col-md-8" name="prodi" value="{{ $prodi->prodi }}">
	</div>
	<br/>
	<div class="col-xs-12 col-sm-12 col-md-12 text-center">
		<input type="hidden" name="_token" value="{{csrf_token()}}">
        <input type="submit" value="Simpan" class="btn btn-primary">
   </div>		
	</div>
	{!! Form::close() !!}
	  </div>
	</div>
  </div>
</div>
@endsection