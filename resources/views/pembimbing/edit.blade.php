@extends('layouts.app')

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
		<label class="col-md-4">NIM</label>
             {!!Form::select('user_id', $user, $pembimbing->user_id,array('class' => 'form-control' ));!!} 
	</div>
	<div class="form-group">
		<label class="col-md-4">Nama Mahasiswa</label>
             {!!Form::select('users_id', $users, $pembimbing->users_id,array('class' => 'form-control' ));!!} 
	</div>
	<div class="form-group">
		<label class="col-md-4">Kelas</label>
		{!! Form::text('kelas', null, array('placeholder' => 'Kelas','class' => 'form-control')) !!}
	</div>
	<div class="form-group">
		<label class="col-md-4">Nama Dosen</label>
             {!!Form::select('dosen_id', $dosen, $pembimbing->dosen_id,array('class' => 'form-control' ));!!} 
	</div>
	<div class="form-group">
		<label class="col-md-4"> Prodi </label>
             {!!Form::select('prodi_id', $prodi, $pembimbing->prodi_id,array('class' => 'form-control' ));!!} 
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