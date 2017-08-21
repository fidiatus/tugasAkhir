@extends('layout.default')

@section('content')
<div class="container">
<div class="row">
  <div class="col-md-13 col-sm-13 col-xs-16">
    <div class="x_panel">
      <div class="x_title">
        <h2>Show Data Pembimbing</h2>
          <div class="clearfix"></div>
      </div>
          <div class="x_content">
            <a class="btn btn-primary" href="{{ route('pembimbing.edit',$pembimbing->id) }}">Edit</a>
	        <a class="btn btn-primary" href="{{ route('pembimbing.index') }}"> Back</a>
	      </div>
	{!! Form::model($pembimbing, ['method' => 'patch','route' => ['pembimbing.update', $pembimbing->id]]) !!}
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>NIM:</strong>
                <input type="text" class="form-control" readonly="readonly" placeholder="{{ $pembimbing->user_id }}">
            </div>
        </div>
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Mahasiswa:</strong>
                <input type="text" class="form-control" readonly="readonly" placeholder="{{ $pembimbing->user_id }}">
            </div>
        </div>
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>kelas:</strong>
                <input type="text" class="form-control" readonly="readonly" placeholder="{{ $pembimbing->kelas }}">
            </div>
        </div>
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Dosen:</strong>
                <input type="text" class="form-control" readonly="readonly" placeholder="{{ $pembimbing->dosen_id }}">
            </div>
        </div>
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Prodi:</strong>
                <input type="text" class="form-control" readonly="readonly" placeholder="{{ $pembimbing->prodi_id }}">            
                </div>
        </div>	
{!! Form::close() !!}
	</div>
	</div>
	</div>
    </div>
    </div>
@endsection