@extends('layouts.apps')

 
@section('content')
<div class="container">
    <div class="row">
  		<div class="col-md-12 col-sm-12 col-xs-12">
	    <div class="panel panel-default">
	        <div class="panel-heading"><h4>Permission Role Management</h4></div>
          
    <div class="panel-body">

	<!-- ========== tampilan Data =================== -->
    <div class="well clearfix">
	@if ($message = Session::get('success'))
		<div class="alert alert-success">
			<p>{{ $message }}</p>
		</div>
	@endif
	<!-- ============= Tampilan Pencarian ============== -->
      <div class="panel-body">
        <form class="" action="" method="">
            <input type="text" name="keyword" class="form-control" placeholder="Cari sesuatu ..">
        </form>
      </div>
	<!-- =========== End =============== -->
	<table class="table table-bordered">
		<tr>
			<th>No</th>
			<th>Pemission</th>
			<th>Roles</th>
		</tr>
	 
	@foreach ($permissionroles as $key => $permissionrole)
	<tr>
		<td>{{ ++$i }}</td>
		<td>
			{{ $permissionrole->permission->name }}
		</td>
		<td>
			{{ $permissionrole->role->name }}
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