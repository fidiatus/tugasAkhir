@extends('layouts.apps')

@section('content')

<div class="container">
<div class="row">
  <div class="col-md-16 col-sm-16 col-xs-18">
    <div class="x_panel">
      <div class="x_title">
        <h2>Login</h2>
          <div class="clearfix"></div>
      </div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
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

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-sign-in"></i> Login
                                </button>

                                <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
