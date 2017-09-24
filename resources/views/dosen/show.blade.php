@extends('layouts.apps')

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="x_panel">
      <div class="x_title">
        <h2> Data Dosen Jurusan Teknik Sipil</h2>
        <div class="clearfix"></div>
      </div>

      <div class="panel-body">
        <div class="row">
          <div class="col-md-12 col-xs-12 col-md-12">
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
                <strong>Bidang Mengajar:</strong>
                <input type="text" class="form-control" readonly="readonly" placeholder="{{ $dosen->bidang->nama_bidang }}">
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