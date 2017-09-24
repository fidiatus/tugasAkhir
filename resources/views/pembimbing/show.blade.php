@extends('layouts.apps')

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="x_panel">
      <div class="x_title">
        <h2> Data Pembimbing Jurusan Teknik Sipil</h2>
        <div class="clearfix"></div>
      </div>

      <div class="panel-body">
        <div class="row">
          <div class="col-md-12 col-xs-12 col-md-12">
        <div class="panel-body">
          <a class="btn btn-primary" href="{{ route('pembimbing.edit',$pembimbing->id) }}">Edit</a>
          <a class="btn btn-primary" href="{{ route('pembimbing.index') }}"> Back</a>
        </div>
    {!! Form::model($pembimbing, ['method' => 'patch','route' => ['pembimbing.update', $pembimbing->id]]) !!}
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                  <strong>Nama Mahasiswa:</strong>
                  <input type="text" class="form-control" readonly="readonly" placeholder="{{ $pembimbing->nama_mhs }}">
              </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                  <strong>Nomor Induk Mahasiswa:</strong>
                  <input type="text" class="form-control" readonly="readonly" placeholder="{{ $pembimbing->nim }}">
              </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                  <strong>Program Studi:</strong>
                  <input type="text" class="form-control" readonly="readonly" placeholder="{{ $pembimbing->prodi_id }}">
              </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                  <strong>Proyek Praktek Lapangan:</strong>
                  <input type="text" class="form-control" readonly="readonly" placeholder="{{ $pembimbing->daftarpkl_id }}">
              </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                  <strong>Nama Dosen pembimbing:</strong>
                  <input type="text" class="form-control" readonly="readonly" placeholder="{{ $pembimbing->dosen_id }}">
              </div>
          </div>
        </div>
    {!! Form::close() !!}
        </div>
    </div>
  </div>
</div></div></div>
@endsection