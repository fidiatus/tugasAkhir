@extends('layouts.apps')


@section('content')
<div class="container">
	<div class="row">
        <div class="col-md-13 col-sm-13 col-xs-16">
        <div class="panel panel-default">
            <div class="panel-heading"><h4>Users Management</h4></div>
          
    <div class="panel-body">
        <div class="panel-body">
            <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
        </div>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
	{!! Form::open(array('route' => 'users.store','method'=>'POST')) !!}
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Nomor Induk :</strong>
                {!! Form::text('no_induk', null, array('placeholder' => 'Nomor Induk','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama :</strong>
                {!! Form::text('nama_user', null, array('placeholder' => 'Nama','class' => 'form-control')) !!}
            </div>
        </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Username:</strong>
                {!! Form::text('username', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
            </div>
        </div>

    @if (Auth::user()->roles()->first()->name == "Mahasiswa" || "Admin")
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Program Studi:</strong>
          {!!Form::select('prodi_id', $prodi,null, array('class' => 'form-control'));!!} 
            </div>
        </div>
        @endif
    @if (Auth::user()->roles()->first()->name == "Kaprodi" || "Admin")
     <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Bidang:</strong>
          {!!Form::select('bidang_id', $bidang,null, array('class' => 'form-control'));!!}  
        </div>
    </div>
    @endif
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Nomor Handphone :</strong>
                {!! Form::text('no_hp', null, array('placeholder' => 'HP','class' => 'form-control')) !!}
        </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Password:</strong>
                {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Confirm Password:</strong>
                {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Role:</strong>
                {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
			<button type="submit" class="btn btn-primary">Submit</button>
        </div>
	</div>
	{!! Form::close() !!}
    </div>
    </div>
@endsection