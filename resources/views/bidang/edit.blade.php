@extends('layouts.apps')

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="x_panel">
      <div class="x_title">
        <h2> Input Data Users Jurusan Teknik Sipil</h2>
        <div class="clearfix"></div>
      </div>

      <div class="panel-body">
        <div class="row">
          <div class="col-md-12 col-xs-12 col-md-12">
          <div class="panel-body">
	            <a class="btn btn-primary" href="{{ route('bidang.index') }}"> Back</a>
	      </div>
	{!! Form::model($bidang, ['method' => 'patch','route' => ['bidang.update', $bidang->id]]) !!}
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Bidang : </strong>
                {!! Form::text('nama_bidang', null, array('placeholder' => 'Bidang','class' => 'form-control')) !!}
                @if ($errors->has('nama_bidang'))
                    <span class="help-block">
                        <strong>{{ $errors->first('nama_bidang') }}</strong>
                    </span>
                @endif
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
</div>

@endsection