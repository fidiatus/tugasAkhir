@extends('layouts.apps')


@section('content')
<div class="container">
	<div class="row">
        <div class="col-md-13 col-sm-13 col-xs-16">
        <div class="panel panel-default">
            <div class="panel-heading"><h4>Edit data Profil #{{ Auth::user()->nama_user }} </h4></div>
          
    <div class="panel-body">
        <div class="panel-body">
	        <a class="btn btn-primary" href="{{ route('mahasiswa.show') }}"> Back</a>
        </div>
	{!! Form::model($mahasiswa, ['method' => 'PATCH','route' => ['mahasiswa.update', $mahasiswa->id]]) !!}
	<div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12">
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
                @if ($errors->has('nama_bidang'))
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
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Jenis Kelamin :</strong>
              <input type="radio" name="jenis_kelamin" id="lk" value="lk" checked>Pria
              <input type="radio" name="jenis_kelamin" id="pr" value="pr"> Wanita      
                @if ($errors->has('jenis_kelamin'))
                    <span class="help-block">
                        <strong>{{ $errors->first('jenis_kelamin') }}</strong>
                    </span>
                @endif
                <br/>
        </div>
    </div>
     <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Program Studi:</strong>
             {!!Form::select('prodi_id', $prodi, $mahasiswa->prodi_id,array('class' => 'form-control' ));!!}            
                @if ($errors->has('prodi_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('prodi_id') }}</strong>
                    </span>
                @endif
                <br/>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Tahun Angkatan :</strong>
                {!! Form::text('angkatan', null, array('placeholder' => 'Tahun Angkatan','class' => 'form-control')) !!}    
                @if ($errors->has('angkatan'))
                    <span class="help-block">
                        <strong>{{ $errors->first('angkatan') }}</strong>
                    </span>
                @endif 
                <br/>
        </div>
    </div>    
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Nomor Handphone :</strong>
                {!! Form::text('no_hp', null, array('placeholder' => 'HP','class' => 'form-control')) !!}    
                @if ($errors->has('no_hp'))
                    <span class="help-block">
                        <strong>{{ $errors->first('no_hp') }}</strong>
                    </span>
                @endif
                <br/>
        </div>
    </div>    
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