@extends('layouts.app')

 
@section('content')
<div class="container">
	<div class="row">
  		<div class="col-md-13 col-sm-13 col-xs-16">
    		<div class="x_panel">
      			<div class="x_title">
	            	<h2>Users Management</h2>	        
	        		<div class="pull-right">
	            		<a class="btn btn-success" href="{{ route('users.create') }}"> Create New User</a>
	        		</div>
          		<div class="clearfix"></div>
	      		</div>
	@if ($message = Session::get('success'))
		<div class="alert alert-success">
			<p>{{ $message }}</p>
		</div>
	@endif
        <div class="title_right">
              <div class="panel-body">
                <form class="" action="" method="">
                    <input type="text" name="search" class="form-control" v-model="search" placeholder="Cari ..">
                </form>
              </div>
	    </div>
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
			<a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a>
			<a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
			{!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        	{!! Form::close() !!}
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
@endsection
