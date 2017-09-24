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
		{!! Form::select('bidangpkl_id', $bidangpkl, null, array('class' => 'form-control')) !!}
	</div>
	<div class="form-group">
		<label class="col-md-4"> Program Studi </label>
             {!!Form::select('prodi_id', $prodi, null,array('class' => 'form-control' ));!!} 
	</div>
	<div class="form-group">
		<label class="col-md-4"> Nama Proyek </label>
            <select name="daftarpkl" class="form-control"> 
             @foreach($daftarpkl as $daftarpkl)
                <option value="{{$daftarpkl->id}}">{{$daftarpkl->nama_mhs}} Proyek {{$daftarpkl->nama_proyek}}</option> 
             @endforeach
           </select> 
	</div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Nama Perusahaan:</strong>            
             {!!Form::select('perusahaan_id', $perusahaan, null,array('class' => 'form-control'))!!}
        </div>
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
	</div></div></div>
@endsection