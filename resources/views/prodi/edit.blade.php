@extends('layouts.apps')

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="x_panel">
      <div class="x_title">
        <h2> Data Prodi Jurusan Teknik Sipil</h2>
        <div class="clearfix"></div>
      </div>

      <div class="panel-body">
        <div class="row">
          <div class="col-md-12 col-xs-12 col-md-12">
          <div class="panel-body">
            <a class="btn btn-primary" href="{{ route('prodi.index') }}"> Back</a>
      </div>
	{!! Form::model($prodi, ['method' => 'patch', 'route' => ['prodi.update', $prodi->id]]) !!}
	<div class="row">
		<label class="col-md-4">Nama Program Studi</label>
		<input class="form-control col-md-8" name="prodi" value="{{ $prodi->prodi }}">
                @if ($errors->has('prodi'))
                    <span class="help-block">
                        <strong>{{ $errors->first('prodi') }}</strong>
                    </span>
                @endif
                <br/>
	</div>
	<br/>
	<div class="col-xs-12 col-sm-12 col-md-12 text-center">
		<input type="hidden" name="_token" value="{{csrf_token()}}">
        <input type="submit" value="Simpan" class="btn btn-primary">
   </div>		
	</div>
	{!! Form::close() !!}
	  </div>
	</div>
  </div>
</div></div>
@endsection