@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-md-13 col-sm-13 col-xs-16">
    <div class="x_panel">
      <div class="x_title">
        <h2>Show Data Bidang</h2>
          <div class="clearfix"></div>
      </div>
          <div class="x_content">
            <a class="btn btn-primary" href="{{ route('bidang.edit',$bidang->id) }}">Edit</a>
	        <a class="btn btn-primary" href="{{ route('bidang.index') }}"> Back</a>
	      </div>
	{!! Form::model($bidang, ['method' => 'patch','route' => ['bidang.update', $bidang->id]]) !!}
	<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Bidang:</strong>
                <input type="text" class="form-control" readonly="readonly" placeholder="{{ $bidang->bidang }}">
            </div>
        </div>
	</div>
	{!! Form::close() !!}
	</div>
	</div>
	</div>
@endsection