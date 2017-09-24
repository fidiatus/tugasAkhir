@extends('layouts.apps')

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="x_panel">
      <div class="x_title">
        <h2> Data Permission Jurusan Teknik Sipil</h2>
        <div class="clearfix"></div>
      </div>

      <div class="panel-body">
        <div class="row">
          <div class="col-md-12 col-xs-12 col-md-12">

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
	<!-- ============= Tampilan Pencarian ============== -->
  
    <div class="title_right">
      <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
      {!! Form::open(['route'=>'permission.index','method'=>'GET','class'=>'navbar-form navbar-right','role'=>'search'])!!}
        <div class="input-grup">
        {!!Form::text('term',Request::get('term'),['class'=>'form-control','placeholder'=>'Search...'])!!}
        <span class="input-btn-group">
            <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button></span> 
        </div>
      </div></div>
      {!! Form::close()!!}
	<!-- =========== End =============== -->

		<table class="table table-bordered">
			<tr>
				<th>No</th>
				<th>Nama Permission</th>
				<th>Deskripsi</th>
				<th width="280px">Aksi</th>
			</tr>
		@foreach ($permissions as $key => $permission)
		<tr>
			<td>{{ ++$i }}</td>
			<td>{{ $permission->display_name }}</td>
			<td>{{ $permission->description }}</td>
			<td>
				<a class="btn btn-info" href="{{ route('permission.show',$permission->id) }}">Show</a>
				<a class="btn btn-primary" href="{{ route('permission.edit',$permission->id) }}">Edit</a>
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg{{$permission->id}}">Delete</button>

                  <div class="modal fade bs-example-modal-lg{{$permission->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel">WARNING</h4>
                        </div>
                        <div class="modal-body">
                          <h4>Yakin akan Meghapus {{$permission->name}}</h4>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          {!! Form::open(['method' => 'DELETE','route' => ['permission.destroy', $permission->id],'style'=>'display:inline']) !!}
	            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
	        	{!! Form::close() !!}
	        	</div>
	        	</div>
	        	</div>
	        	</div>
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
</div></div>
@endsection