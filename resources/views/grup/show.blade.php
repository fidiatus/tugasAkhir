@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
      <div class="col-md-13 col-sm-13 col-xs-16">
      <div class="panel panel-default">
          <div class="panel-heading"><h4>Grup Praktek Kerja Lapangan</h4></div>
          
    <div class="panel-body">
          <div class="panel-body">
            <a class="btn btn-primary" href="{{ route('grup.edit',$grup->id) }}">Edit</a>
	        <a class="btn btn-primary" href="{{ route('grup.index') }}"> Back</a>
	      </div>
	{!! Form::model($grup, ['method' => 'patch','route' => ['grup.update', $grup->id]]) !!}
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Prodi:</strong>
                <input type="text" class="form-control" readonly="readonly" placeholder="{{ $grup->prodi }}">
            </div>
        </div>
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Mahasiswa:</strong>
                <input type="text" class="form-control" readonly="readonly" placeholder="{{ $grup->user_id }}">
            </div>
        </div>
    </div>	
{!! Form::close() !!}
      </div>
	   </div>
	  </div>
  </div>
</div>
@endsection