@extends('layouts.apps')


@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-13 col-sm-13 col-xs-16">
      <div class="panel panel-default">
        <div class="panel-heading"><h4>Data Profil  #{{ Auth::user()->nama_user }}</h4></div>
          
    <div class="panel-body">            
            @permission('create-user')
        <div class="panel-body">       
            <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
            @endpermission
            @permission('edit-user')
            <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
            @endpermission
	    </div>
	<div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nomor Induk:</strong>
                <input type="text" class="form-control" readonly="readonly" placeholder="{{ $user->no_induk }}">     
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama:</strong>
                <input type="text" class="form-control" readonly="readonly" placeholder="{{ $user->nama_user }}">     
            </div>
        </div>
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Username:</strong>
                <input type="text" class="form-control" readonly="readonly" placeholder="{{ $user->username }}">     
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                <input type="text" class="form-control" readonly="readonly" placeholder="{{ $user->email }}">     
            </div>
        </div>
        @if (Auth::user()->roles()->first()->name == "Mahasiswa")
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Program Studi:</strong>
                <input type="text" class="form-control" readonly="readonly" placeholder="{{  $user->prodi->prodi}}">   
            </div>
        </div>
        @endif
        @if (Auth::user()->roles()->first()->name == "Kaprodi")
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Bidang:</strong>
                <input type="text" class="form-control" readonly="readonly" placeholder="{{  $user->bidang->nama_bidang}}"> 
            </div>
        </div>
        @endif
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nomor Handphone:</strong>
                <input type="text" class="form-control" readonly="readonly" placeholder="{{ $user->no_hp }}">     
            </div>
        </div>        @permission('show-data')
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Roles:</strong>
                @if(!empty($user->roles))
					@foreach($user->roles as $v)
						<label class="label label-success">{{ $v->display_name }}</label>
					@endforeach
				@endif
            </div>
        </div>
    @endpermission
	</div>
    </div>
    </div>
    </div>
    </div>
    </div>
@endsection