@extends('layouts.apps')

@section('content')
<div class="container">
 <div class="row">
      <div class="col-md-13 col-sm-13 col-xs-16">
      <div class="panel panel-default">
          <div class="panel-heading"><h4>Dosen Management</h4></div>
          
    <div class="panel-body">
    @if (!Auth::user()->roles()->first()->name == "Kaprodi" )
          <div class="panel-body">
              <a class="btn btn-primary" href="{{ route('dosen.index') }}"> Back</a>
          </div>
    @endif
  {!! Form::open(array('route' => 'dosen.store','method'=>'POST')) !!}
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>NIP :</strong>
                {!! Form::text('nip', null, array('placeholder' => 'NIP','class' => 'form-control')) !!}
                @if ($errors->has('nip'))
                    <span class="help-block">
                        <strong>{{ $errors->first('nip') }}</strong>
                    </span>
                @endif
                <br/>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Nama Dosen:</strong>
                {!! Form::text('nama_dosen', null, array('placeholder' => 'Nama','class' => 'form-control')) !!}
                @if ($errors->has('nama_dosen'))
                    <span class="help-block">
                        <strong>{{ $errors->first('nama_dosen') }}</strong>
                    </span>
                @endif                
                <br/>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Bidang Mengajar:</strong>
             {!!Form::select('bidang_id', $bidang, null, array('class' => 'form-control' ));!!} 
                @if ($errors->has('bidang_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('bidang_id') }}</strong>
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