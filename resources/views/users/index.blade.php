@extends('layouts.apps')

 
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="x_panel">
      <div class="x_title">
        <h2> Data Users Jurusan Teknik Sipil</h2>
        <div class="clearfix"></div>
      </div>

      <div class="panel-body">
        <div class="row">
          <div class="col-md-12 col-xs-12 col-md-12">
		    <div class="panel-body">
		        <form class="" action="" method="">
		        <a class="btn btn-success" href="{{ route('users.create') }}"> Create New users</a>
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
      {!! Form::open(['route'=>'users.index','method'=>'GET','class'=>'navbar-form navbar-right','role'=>'search'])!!}
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
			<th>No Induk</th>
			<th>Email</th>
			<th>Roles</th>
			<th width="300px">Action</th>
		</tr>
	@foreach ($data as $key => $user)
	<tr>
		<td>{{ ++$i }}</td>
		<td>{{ $user->no_induk }}</td>
		<td>{{ $user->email }}</td>
		<td>
			@if(!empty($user->roles))
				@foreach($user->roles as $v)
					<label class="label label-success">{{ $v->display_name }}</label>
				@endforeach
			@endif
		</td>
		<td>		
			<a href="{{ route('users.show',$user->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-folder"></i> Show</a>
			<a href="{{ route('users.edit',$user->id) }}" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i> Edit</a>
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg{{$user->id}}">Delete</button>

                  <div class="modal fade bs-example-modal-lg{{$user->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                        </div>
                        <div class="modal-body">
                          <h4>Text in a modal</h4>
                          <p>Yakin akan Meghapus {{$user->nama_user}}</p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
        	{!! Form::close() !!}
        	</div>
        	</div>
        	</div>
        	</div>        	
		</td>
	</tr>
	@endforeach
	</table>
	{!! $data->render() !!}
				  </div>
				</div>
			  </div>
	    	</div>
		</div>
	</div>
</div>
@endsection
