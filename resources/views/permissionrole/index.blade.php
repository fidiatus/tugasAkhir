@extends('layouts.app')

 
@section('content')
<div class="container">
    <div class="row">
  		<div class="col-md-13 col-sm-13 col-xs-16">
	    <div class="panel panel-default">
	        <div class="panel-heading"><h4>Permission Role Management</h4></div>
          
    <div class="panel-body">
	<!-- ============= Tampilan Pencarian ============== -->
      <div class="panel-body">
        <form class="" action="" method="">
            <input type="text" name="keyword" class="form-control" placeholder="Cari sesuatu ..">
        </form>
      </div>
	<!-- =========== End =============== -->

      <div class="panel-body">
        <form class="" action="" method="">
        <a class="btn btn-success" href="{{ route('permissionrole.create') }}"> Create New PermissionRole</a>
        </form>
      </div>

	<!-- ========== tampilan Data =================== -->
    <div class="well clearfix">
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
	 </div>
	</div>
</div>
@endsection