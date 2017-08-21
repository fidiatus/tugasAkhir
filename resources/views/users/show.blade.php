@extends('layouts.app')


@section('content')
<div class="container">
<div class="row">
  <div class="col-md-13 col-sm-13 col-xs-16">
    <div class="x_panel">
      <div class="x_title">
        <h2>Data Profil  #{{ Auth::user()->no_induk }} </h2>
          <div class="clearfix"></div>
      </div>
          <div class="x_content">
            <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
	      </div>
	<div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>No Induk:</strong>
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
                <strong>Prodi:</strong>
                <input type="text" class="form-control" readonly="readonly" placeholder="{{  $user->prodi_id}}">   
            </div>
        </div>
        @endif
        @if (Auth::user()->roles()->first()->name == "Kaprodi")
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Bidang:</strong>
                <input type="text" class="form-control" readonly="readonly" placeholder="{{  $user->bidang_id}}"> 
            </div>
        </div>
        @endif
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>No HP:</strong>
                <input type="text" class="form-control" readonly="readonly" placeholder="{{ $user->no_hp }}">     
            </div>
        </div>        
    @if (!Auth::user()->roles()->first()->name == "Mahasiswa" && "Kaprodi")
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
        @endif
	</div>
    </div>
    </div>
    </div>
    </div>
@endsection