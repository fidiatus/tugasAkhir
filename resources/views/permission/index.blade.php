@extends('layout.default')

@section('content')
	<div class="row">
  <div class="col-md-13 col-sm-13 col-xs-16">
    <div class="x_panel">
      <div class="x_title">
	            <h2>Permission Management</h2>
          <div class="clearfix"></div>
	        </div>
	        <div class="pull-right">
	            <a class="btn btn-success" href="{{ route('permission.create') }}"> Create New permission</a>
	        </div>
	@if ($message = Session::get('success'))
		<div class="alert alert-success">
			<p>{{ $message }}</p>
		</div>
	@endif
	<table class="table table-bordered">
		<tr>
			<th>No</th>
			<th>Name</th>
			<th>Description</th>
			<th width="280px">Action</th>
		</tr>
	@foreach ($permissions as $key => $permission)
	<tr>
		<td>{{ ++$i }}</td>
		<td>{{ $permission->display_name }}</td>
		<td>{{ $permission->description }}</td>
		<td>
			<a class="btn btn-info" href="{{ route('permission.show',$permission->id) }}">Show</a>
			<a class="btn btn-primary" href="{{ route('permission.edit',$permission->id) }}">Edit</a>
			{!! Form::open(['method' => 'DELETE','route' => ['permission.destroy', $permission->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        	{!! Form::close() !!}
		</td>
	</tr>
	@endforeach
	</table>
	{!! $permissions->render() !!}
      </div>
	    </div>
	</div>
@endsection