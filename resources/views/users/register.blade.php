@extends('layouts.apps')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register User</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/registrasi/save') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('no_induk') ? ' has-error' : '' }}">
                            <label for="no_induk" class="col-md-4 control-label">NIM / NIP</label>

                            <div class="col-md-6">
                                <input id="no_induk" type="text" class="form-control" name="no_induk" value="{{ old('no_induk') }}">

                                @if ($errors->has('no_induk'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('no_induk') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('nama_user') ? ' has-error' : '' }}">
                            <label for="nama_user" class="col-md-4 control-label">Nama</label>

                            <div class="col-md-6">
                                <input id="nama_user" type="text" class="form-control" name="nama_user" value="{{ old('nama_user') }}">

                                @if ($errors->has('nama_user'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nama_user') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('roles') ? ' has-error' : '' }}">
                            <label for="roles" class="col-md-4 control-label">Level</label>
                            @foreach($roles as $roles)
                            <div class="col-md-6">
                                <input type="radio" name="roles" value="{{$roles->id}}">
                                @if($roles->id==5)
                                    Mahasiswa
                                @elseif($roles->id==6)
                                    Kaprodi
                                @endif
                            </div>
                            @endforeach
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
