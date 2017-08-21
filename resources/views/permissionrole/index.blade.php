@extends('layout.default')

 
@section('content')
<div class="row">
  <div class="col-md-16 col-sm-16 col-xs-18">
    <div class="x_panel">
      <div class="x_title">
        <h2>Tabel Data Permission Role</h2>
          <div class="clearfix"></div>
      </div>
          <div class="x_content">
	            <a class="btn btn-success" href="{{ route('permissionrole.create') }}"> Create Permission Role</a>
	        </div>
	@if ($message = Session::get('success'))
		<div class="alert alert-success">
			<p>{{ $message }}</p>
		</div>
	@endif
	<table class="table table-bordered">
		<tr>
			<th>No</th>
			<th>Pemission</th>
			<th>Roles</th>
			<th width="280px">Action</th>
		</tr>
	 
	@foreach ($permissionroles as $key => $permissionrole)
	<tr>
		<td>{{ ++$i }}</td>
		<td>
			{{ $permissionrole->permission_id }}
		</td>
		<td>
			{{ $permissionrole->role_id }}
		</td>
		<td>
			<a class="btn btn-info" href="{{ route('permissionrole.show',[$permissionrole->permission_id, $permissionrole->role_id]) }}">Show</a>
			<a class="btn btn-primary" href="{{ route('permissionrole.edit',[$permissionrole->permission_id, $permissionrole->role_id]) }}">Edit</a>
			{!! Form::open(['method' => 'DELETE','route' => ['permissionrole.destroy', $permissionrole->permission_id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        	{!! Form::close() !!}
		</td>
	</tr>
	@endforeach
	</table>
	{!! $permissionroles->render() !!}
      </div>
	    </div>
	</div>
@endsection