@extends('layouts.apps')

@section('content')
<div class="container">
<div class="row">
      <div class="col-md-13 col-sm-13 col-xs-16">
      <div class="panel panel-default">
          <div class="panel-heading"><h4>Daftar PKL </h4></div>
          
    <div class="panel-body">
      <div class="panel-body">
        <a class="btn btn-primary" href="{{ route('daftarpkl.edit',$daftarpkl->id) }}">Edit</a>
        <a class="btn btn-primary" href="{{ route('daftarpkl.index') }}"> Back</a>
      </div>
	{!! Form::model($daftarpkl, ['method' => 'patch','route' => ['daftarpkl.update', $daftarpkl->id]]) !!}
	<div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Mahasiswa:</strong>
                <input type="text" class="form-control" readonly="readonly" placeholder="{{ $daftarpkl->nma_mhs }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>NIM:</strong>
                <input type="text" class="form-control" readonly="readonly" placeholder="{{ $daftarpkl->nim }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Prodi:</strong>
                <input type="text" class="form-control" readonly="readonly" placeholder="{{ $daftarpkl->prodi_id }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Bidang Praktek Kerja Lapangan:</strong>
                <input type="text" class="form-control" readonly="readonly" placeholder="{{ $daftarpkl->bidangpkl_id }}">            
            </div>
        </div>  
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Perusahaan:</strong>
                <input type="text" class="form-control" readonly="readonly" placeholder="{{ $daftarpkl->perusahaan_id }}">            
            </div>
        </div>  
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Proyek:</strong>
                <input type="text" class="form-control" readonly="readonly" placeholder="{{ $daftarpkl->daftarpkl_id }}">
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