@extends('layouts.apps')

@section('content')
<div class="container">
<div class="row">
      <div class="col-md-13 col-sm-13 col-xs-16">
      <div class="panel panel-default">
          <div class="panel-heading"><h4>Edit Pembimbing</h4></div>
          
    <div class="panel-body">
	@if (count($errors) > 0)
		<div class="alert alert-danger">
			<strong>Whoops!</strong> There were some problems with your input.<br><br>
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif
	{!! Form::model($pembimbing, ['method' => 'patch','route' => ['pembimbing.update', $pembimbing->id]]) !!}
	<div class="row">
	<div class="form-group">
		<label class="col-md-4">Nama Mahasiswa</label>
		{!! Form::text('nama_mhs', null, array('placeholder' => 'nama mahasiswa','class' => 'form-control')) !!}
	</div>
	<div class="form-group">
		<label class="col-md-4">Nomor Induk Mahasiswa</label>
		{!! Form::text('nim', null, array('placeholder' => 'nim','class' => 'form-control')) !!}
	</div>
	<div class="form-group">
		<label class="col-md-4">Bidang Praktek Kerja Lapangan</label>
		{!! Form::text('bidangpkl_id', null, array('placeholder' => 'Bidang PKL','class' => 'form-control')) !!}
	</div>
	<div class="form-group">
		<label class="col-md-4"> Program Studi </label>
             {!!Form::select('prodi_id', $prodi, null,array('class' => 'form-control' ));!!} 
	</div>
	<div class="form-group">
		<label class="col-md-4"> Nama Proyek </label>
             {!!Form::select('daftarpkl_id', $daftarpkl, null,array('class' => 'form-control' ));!!} 
	</div>
	<div class="form-group">
		<label class="col-md-4">Nama Dosen pembimbing</label>
             {!!Form::select('dosen_id', $dosen, null,array('class' => 'form-control' ));!!} 
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
@endsection