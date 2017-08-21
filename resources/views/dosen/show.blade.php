@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
      <div class="col-md-13 col-sm-13 col-xs-16">
      <div class="panel panel-default">
          <div class="panel-heading"><h4>Dosen Management</h4></div>
          
    <div class="panel-body">
          <div class="panel-body">
            <a class="btn btn-primary" href="{{ route('dosen.edit',$dosen->id) }}">Edit</a>
	        <a class="btn btn-primary" href="{{ route('dosen.index') }}"> Back</a>
	      </div>
	{!! Form::model($dosen, ['method' => 'patch','route' => ['dosen.update', $dosen->id]]) !!}
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>NIP:</strong>
                <input type="text" class="form-control" readonly="readonly" placeholder="{{ $dosen->nip }}">
            </div>
        </div>
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Dosen:</strong>
                <input type="text" class="form-control" readonly="readonly" placeholder="{{ $dosen->nama_dosen }}">
            </div>
        </div>
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Bidang:</strong>
                <input type="text" class="form-control" readonly="readonly" placeholder="{{ $dosen->bidang }}">
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