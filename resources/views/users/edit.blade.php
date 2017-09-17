@extends('layouts.apps')


@section('content')
<div class="container">
	<div class="row">
        <div class="col-md-13 col-sm-13 col-xs-16">
        <div class="panel panel-default">
            <div class="panel-heading"><h4>Edit data #{{ Auth::user()->nama_user }} </h4></div>
          
    <div class="panel-body">
        @permission('delete-user')
        <div class="panel-body">
	        <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
            <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a>
        </div>
        @endif
	{!! Form::model($user, ['method' => 'PATCH','route' => ['users.update', $user->id]]) !!}
	<div class="row"><div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Nomor Induk :</strong>
                {!! Form::text('no_induk', null, array('placeholder' => 'Nomor Induk','class' => 'form-control')) !!}
                @if ($errors->has('no_induk'))
                    <span class="help-block">
                        <strong>{{ $errors->first('no_induk') }}</strong>
                    </span>
                @endif
                <br/>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama :</strong>
                {!! Form::text('nama_user', null, array('placeholder' => 'Nama','class' => 'form-control')) !!}
                @if ($errors->has('nama_user'))
                    <span class="help-block">
                        <strong>{{ $errors->first('nama_user') }}</strong>
                    </span>
                @endif
                <br/>
            </div>
        </div>
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Username:</strong>
                {!! Form::text('username', null, array('placeholder' => 'Username','class' => 'form-control')) !!}
                @if ($errors->has('username'))
                    <span class="help-block">
                        <strong>{{ $errors->first('username') }}</strong>
                    </span>
                @endif
                <br/>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
                <br/>
            </div>
        </div>
    @permission('edit-field-kaprodi')
     <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Bidang:</strong>
             {!!Form::select('bidang_id', $bidang, $user->bidang_id,array('class' => 'form-control' ));!!} 
                @if ($errors->has('bidang_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('bidang_id') }}</strong>
                    </span>
                @endif
                <br/>
        </div>
    </div>
    @endpermission
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Nomor Handphone :</strong>
                {!! Form::text('no_hp', null, array('placeholder' => 'HP','class' => 'form-control')) !!}
        </div>
    </div>    
    @permission('edit-data')
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Role:</strong>
                {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control','multiple')) !!}
            </div>
        </div> 
    @endpermission
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
				<button type="submit" class="btn btn-primary">Submit</button>
        </div>
	</div>
	{!! Form::close() !!}
    </div>
    </div>
    </div>
    </div>
    </div>
@endsection