@extends('layouts.apps')

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="x_panel">
      <div class="x_title">
        <h2> Daftar Praktek Kerja Lapangan Jurusan Teknik Sipil</h2>
        <div class="clearfix"></div>
      </div>

      <div class="panel-body">
        <div class="row">
          <div class="col-md-12 col-xs-12 col-md-12">
    <div class="panel-body">
	{!! Form::model($daftarpkl, ['method' => 'patch','route' => ['daftarpkl.update', $daftarpkl->id]]) !!}
	<div class="row">
	<div class="form-group">
	        <label class="col-md-4">Nama Mahasiswa :</label>
	          {!! Form::text('nama_mhs', null, array('placeholder' => 'Nama Mahasiswa','class' => 'form-control')) !!} 
	<div class="form-group">
	        <label class="col-md-4">Nomor Induk Mahasiswa :</label>
	          {!! Form::text('nim', null, array('placeholder' => 'NIM','class' => 'form-control')) !!} 
    </div>
	<div class="form-group">
		<label class="col-md-4"> Program Studi </label>
             {!!Form::select('prodi_id', $prodi, $daftarpkl->prodi_id,array('class' => 'form-control' ));!!} 
	</div>
	<div class="form-group">
		<label class="col-md-4">Bidang Praktek Kerja Lapangan</label>
             {!!Form::select('bidangpkl_id', $bidangpkl, $daftarpkl->bidangpkl_id,array('class' => 'form-control' ));!!} 
	</div>
	<div class="form-group">
		<label class="col-md-4">Perusahaan</label>
             {!!Form::select('perusahaan_id', $perusahaan, $daftarpkl->perusahaan_id,array('class' => 'form-control' ));!!} 
	</div>
	<div class="form-group">
		<label class="col-md-4">Nama Proyek</label>
		{!! Form::text('nama_proyek', null, array('placeholder' => 'nama_proyek','class' => 'form-control')) !!}
	</div>
	<div class="form-group">
		<label class="col-md-4">Semester</label>
		{!! Form::text('semester', null, array('placeholder' => 'semester','class' => 'form-control')) !!}
	</div>
	<div class="form-group">
		<label class="col-md-4">Tahun Ajaran</label>
		{!! Form::text('tahun_ajaran', null, array('placeholder' => 'tahun_ajaran','class' => 'form-control')) !!}
	</div>

	<div class="col-xs-12 col-sm-12 col-md-12 text-center">
				<button type="submit" class="btn btn-primary">Submit</button>
        </div>
	</div>
	{!! Form::close() !!}
	  </div>
	</div>
   </div>
  </div>
</div>
@endsection