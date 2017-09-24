@extends('layouts.apps')

 
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="x_panel">
      <div class="x_title">
        <h2> Data Role User Jurusan Teknik Sipil</h2>
        <div class="clearfix"></div>
      </div>

      <div class="panel-body">
        <div class="row">
          <div class="col-md-12 col-xs-12 col-md-12">

	<!-- ========== tampilan Data =================== -->
    <div class="well clearfix">
	@if ($message = Session::get('success'))
		<div class="alert alert-success">
			<p>{{ $message }}</p>
		</div>
	@endif
	<!-- ============= Tampilan Pencarian ============== -->
      <div class="item form-group">
	<table class="table table-bordered">
		<tr>
			<th>No</th>
			<th>User</th>
			<th>Roles</th>
		</tr>
	 
	@foreach ($roleusers as $key => $roleuser)
	<tr>
		<td>{{ ++$i }}</td>
		<td>
			{{ $roleuser->user->nama_user }}
		</td>
		<td>
			{{ $roleuser->role->name }}
		</td>
	</tr>
	@endforeach
	</table>
	{!! $roleusers->render() !!}
			</div>
		 </div>
		</div>
      </div>
	 </div>
	</div>
</div></div>
@endsection