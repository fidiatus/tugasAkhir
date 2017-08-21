@extends('layout.default')

@section('content')
<div class="container">
<div class="row">
  <div class="col-md-13 col-sm-13 col-xs-16">
    <div class="x_panel">
      <div class="x_title">
        <h2>Show Data PKL</h2>
          <div class="clearfix"></div>
      </div>
          <div class="x_content">
            <a class="btn btn-primary" href="{{ route('daftarpkl.edit',$daftarpkl->id) }}">Edit</a>
	        <a class="btn btn-primary" href="{{ route('daftarpkl.index') }}"> Back</a>
	      </div>
	{!! Form::model($daftarpkl, ['method' => 'patch','route' => ['daftarpkl.update', $daftarpkl->id]]) !!}
	<div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Prodi:</strong>
                <input type="text" class="form-control" readonly="readonly" placeholder="{{ $daftarpkl->prodi }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Grup:</strong>
                <input type="text" class="form-control" readonly="readonly" placeholder="{{ $daftarpkl->grup }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Perusahaan:</strong>
                <input type="text" class="form-control" readonly="readonly" placeholder="{{ $daftarpkl->perusahaan }}">            
            </div>
        </div>  
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Proyek:</strong>
                <input type="text" class="form-control" readonly="readonly" placeholder="{{ $daftarpkl->perusahaan }}">            
            </div>
        </div>  
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Semester:</strong>
                <input type="text" class="form-control" readonly="readonly" placeholder="{{ $daftarpkl->semester }}">
            </div>
        </div>
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tahun Ajaran:</strong>
                <input type="text" class="form-control" readonly="readonly" placeholder="{{ $daftarpkl->tahun_ajaran }}">
            </div>
        </div>
    </div>
{!! Form::close() !!}
	</div>
	</div>
	</div>
    </div>
@endsection