@extends('layouts.apps')

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="x_panel">
      <div class="x_title">
        <h2> Data Praktek kerja Lapangan Jurusan Teknik Sipil</h2>
        <div class="clearfix"></div>
      </div>

      <div class="panel-body">
        <div class="row">
          <div class="col-md-12 col-xs-12 col-md-12">
      <div class="panel-body">
        <a class="btn btn-primary" href="{{ route('daftarpkl.edit',$daftarpkl->id) }}">Edit</a>
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
                <strong>Nomor Induk Mahasiswa:</strong>
                <input type="text" class="form-control" readonly="readonly" placeholder="{{ $daftarpkl->nim }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Prodi:</strong>
                <input type="text" class="form-control" readonly="readonly" placeholder="{{ $daftarpkl->prodi }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Bidang Praktek Kerja Lapangan:</strong>
                <input type="text" class="form-control" readonly="readonly" placeholder="{{ $daftarpkl->bidang_pkl }}">            
            </div>
        </div>  
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Perusahaan:</strong>
                <input type="text" class="form-control" readonly="readonly" placeholder="{{ $daftarpkl->nama_perusahaan }}">            
            </div>
        </div>  
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Proyek:</strong>
                <input type="text" class="form-control" readonly="readonly" placeholder="{{ $daftarpkl->nama_proyek }}">
            </div>
        </div>
    </div>
{!! Form::close() !!}
    </div>
	</div>
	</div>
	</div>
    </div>
</div>
@endsection