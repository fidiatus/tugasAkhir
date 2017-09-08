@extends('layouts.apps')

@section('content')
<div class="container">
<div class="row">
      <div class="col-md-13 col-sm-13 col-xs-16">
      <div class="panel panel-default">
          <div class="panel-heading"><h4>Edit Bidang Praktek kerja Lapangan</h4></div>
          
    <div class="panel-body">
          <div class="panel-body">
	            <a class="btn btn-primary" href="{{ route('bidangpkl.index') }}"> Back</a>
	      </div>
	@if (count($errors) > 0)
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif
	{!! Form::model($bidangpkl, ['method' => 'patch','route' => ['bidangpkl.update', $bidangpkl->id]]) !!}
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Bidang Praktek Kerja Lapangan : </strong>
                {!! Form::text('bidang_pkl', null, array('placeholder' => 'Bidang PKL','class' => 'form-control')) !!}
            </div>
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