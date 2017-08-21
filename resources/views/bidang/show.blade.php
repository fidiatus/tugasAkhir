@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
      <div class="col-md-13 col-sm-13 col-xs-16">
      <div class="panel panel-default">
          <div class="panel-heading"><h4>Bidang Management</h4></div>
          
    <div class="panel-body">
        <div class="panel-body">
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
</div>
@endsection