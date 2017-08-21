@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
      <div class="col-md-13 col-sm-13 col-xs-16">
      <div class="panel panel-default">
          <div class="panel-heading"><h4>Dosen Management</h4></div>
          
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
	{!! Form::model($dosen, ['method' => 'patch','route' => ['dosen.update', $dosen->id]]) !!}
	<div class="row">
		<div class="form-group">
			<label class="col-md-4">NIP</label>
			{!! Form::text('nip', null, array('placeholder' => 'NIP','class' => 'form-control')) !!}
		</div>
		<div class="form-group">
			<label class="col-md-4">Nama</label>
			{!! Form::text('nama', null, array('placeholder' => 'nama','class' => 'form-control')) !!}
		</div>
		<div class="form-group">
			<label class="col-md-4">Bidang</label>
	             {!!Form::select('bidang_id', $perusahaan, $dosen->bidang_id,array('class' => 'form-control' ));!!} 
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