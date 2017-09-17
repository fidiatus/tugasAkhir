@extends('layouts.apps')

@section('content')
<div class="container">
  <div class="row">
      <div class="col-md-13 col-sm-13 col-xs-16">
      <div class="panel panel-default">
          <div class="panel-heading"><h4>Bidang Management</h4></div>
          
    <div class="panel-body">
        <div class="clearfix"></div>
          <div class="panel-body">
              <a class="btn btn-primary" href="{{ route('bidang.index') }}"> Back</a>
          </div>
  {!! Form::open(array('route' => 'bidang.store','method'=>'POST')) !!}
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Bidang:</strong>
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