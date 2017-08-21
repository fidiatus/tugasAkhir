@extends('layout.default')

@section('content')
<div class="container">
<div class="row">
  <div class="col-md-13 col-sm-13 col-xs-16">
    <div class="x_panel">
      <div class="x_title">
        <h2>Edit Data Prodi</h2>
          <div class="clearfix"></div>
      </div>
      <div class="x_content">
            <a class="btn btn-primary" href="{{ route('prodi.index') }}"> Back</a>
      </div>
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
	{!! Form::model($prodi, ['method' => 'patch', 'route' => ['prodi.update', $prodi->id]]) !!}
	<div class="row">
		<label class="col-md-4">Nama Prodi</label>
		<input class="form-control col-md-8" name="nama_prodi" value="{{ $prodi->nama_prodi }}">
	</div>
	<br/>
	<div class="col-xs-12 col-sm-12 col-md-12 text-center">
				<button type="submit" class="btn btn-primary">Submit</button>
    </div>
	</div>
	{!! Form::close() !!}
	</div>
  </div>
</div>
@endsection