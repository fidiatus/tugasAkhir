@extends('layouts.apps')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-13 col-sm-13 col-xs-16">
      <div class="panel panel-default">
          <div class="panel-heading"><h4>Permission Management</h4></div>
          
        <div class="panel-body">
	        <div class="panel-body">
            <a class="btn btn-primary" href="{{ route('permission.edit',$permission->id) }}">Edit</a>
	            <a class="btn btn-primary" href="{{ route('permission.index') }}"> Back</a>
	        </div>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $permission->display_name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                {{ $permission->description }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Roles:</strong>
                @if(!empty($permissionRole))
					@foreach($permissionRole as $v)
						<label class="label label-success">{{ $v->display_name }}</label>
					@endforeach
				@endif
            </div>
        </div>
    </div>
	</div>
	</div>
	</div>
@endsection