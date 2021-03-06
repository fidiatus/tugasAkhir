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
            <a class="btn btn-primary" href="{{ route('prodi.edit',$prodi->id) }}">Edit</a>
	        <a class="btn btn-primary" href="{{ route('prodi.index') }}"> Back</a>
	      </div>
	    {!! Form::model($prodi, ['method' => 'patch','route' => ['prodi.update', $prodi->id]]) !!}
		  <div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>ID:</strong>
                {{ $prodi->id }}
            </div>
        </div>
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Progam Studi:</strong>
                <input type="text" class="form-control" readonly="readonly" placeholder="{{ $prodi->prodi }}">
            </div>
        </div>
    </div>
	{!! Form::close() !!}
    </div>
	 </div>
	</div>
 </div>
</div></div>
@endsection