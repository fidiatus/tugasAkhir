@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
  		<div class="col-md-13 col-sm-13 col-xs-16">
	    <div class="panel panel-default">
	        <div class="panel-heading"><h4>Permission Management</h4></div>
          
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
        <a class="btn btn-success" href="{{ route('permission.create') }}"> Create New permission</a>
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
		<!-- ======= End ======= -->

		</div>
      </div>
	</div>
  </div>
</div>
@endsection