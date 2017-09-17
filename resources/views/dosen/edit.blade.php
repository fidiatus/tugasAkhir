@extends('layouts.apps')

@section('content')
<div class="container">
<div class="row">
      <div class="col-md-13 col-sm-13 col-xs-16">
      <div class="panel panel-default">
          <div class="panel-heading"><h4>Dosen Management</h4></div>
          
    <div class="panel-body">
	{!! Form::model($dosen, ['method' => 'patch','route' => ['dosen.update', $dosen->id]]) !!}
	<div class="row">
		<div class="form-group">
			<label class="col-md-4">NIP</label>
			{!! Form::text('nip', null, array('placeholder' => 'NIP','class' => 'form-control')) !!}
                @if ($errors->has('nip'))
                    <span class="help-block">
                        <strong>{{ $errors->first('nip') }}</strong>
                    </span>
                @endif
		</div>
		<div class="form-group">
			<label class="col-md-4">Nama Dosen</label>
			{!! Form::text('nama_dosen', null, array('placeholder' => 'nama','class' => 'form-control')) !!}
                @if ($errors->has('nama_dosen'))
                    <span class="help-block">
                        <strong>{{ $errors->first('nama_dosen') }}</strong>
                    </span>
                @endif		
                <br/>	
		</div>
		<div class="form-group">
			<label class="col-md-4">Bidang Mengajar</label>
	             {!!Form::select('bidang_id', $bidang, $dosen->bidang_id,array('class' => 'form-control' ));!!} 
                @if ($errors->has('bidang_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('bidang_id') }}</strong>
                    </span>
                @endif
                <br/>
		</div>

		<div class="col-xs-12 col-sm-12 col-md-12 text-center">
			<input type="hidden" name="_method" value="patch">
			<input type="hidden" name="_token" value="{{csrf_token()}}">
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