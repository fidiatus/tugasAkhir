@extends('layouts.apps')

@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="x_panel">
      <div class="x_title">
        <h2> Data Bidang PKL Jurusan Teknik Sipil</h2>
        <div class="clearfix"></div>
      </div>

      <div class="panel-body">
        <div class="row">
          <div class="col-md-12 col-xs-12 col-md-12">
          <a class="btn btn-primary" href="{{ route('bidangpkl.edit',$bidangpkl->id) }}">Edit</a>
          <a class="btn btn-primary" href="{{ route('bidangpkl.index') }}"> Back</a>
        </div>
  	{!! Form::model($bidangpkl, ['method' => 'patch','route' => ['bidangpkl.update', $bidangpkl->id]]) !!}
      	<div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                      <strong>Nama Bidang Praktek Kerja Lapangan:</strong>
                      <input type="text" class="form-control" readonly="readonly" placeholder="{{ $bidangpkl->bidang_pkl }}">
                  </div>
              </div>
      	</div>
  	{!! Form::close() !!}
    	</div>
  	</div>
  </div>
</div></div>
@endsection