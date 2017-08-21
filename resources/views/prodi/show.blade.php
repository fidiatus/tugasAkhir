@extends('layout.default')

@section('content')
<div class="container">
<div class="row">
  <div class="col-md-13 col-sm-13 col-xs-16">
    <div class="x_panel">
      <div class="x_title">
        <h2>Show Data Prodi</h2>
          <div class="clearfix"></div>
      </div>
          <div class="x_content">
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
                <strong>Nama Prodi:</strong>
                <input type="text" class="form-control" readonly="readonly" placeholder="{{ $prodi->nama_prodi }}">
            </div>
        </div>
    </div>
	{!! Form::close() !!}
	 </div>
	</div>
 </div>
</div>
@endsection