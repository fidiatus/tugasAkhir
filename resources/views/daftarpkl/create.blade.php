@extends('layouts.app')

@section('content')
<div class="container">
 <div class="row">
      <div class="col-md-13 col-sm-13 col-xs-16">
      <div class="panel panel-default">
          <div class="panel-heading"><h4>PKL Management</h4></div>
          
    <div class="panel-body">
    @if (!Auth::user()->roles()->first()->name == "Mahasiswa" || !Auth::user()->roles()->first()->name =="Dosen")
          <div class="panel-body">
              <a class="btn btn-primary" href="{{ route('daftarpkl.index') }}"> Back</a>
          </div>
    @endif
  @if (count($errors) > 0)
    <div class="alert alert-danger">
      <strong>Whoops!</strong> There were some problems with your input.<br><br>
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif
  {!! Form::open(array('route' => 'daftarpkl.store','method'=>'POST')) !!}
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Prodi :</strong>
             {!!Form::select('prodi_id', $prodi, 'S');!!} 
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Grup :</strong>
             {!!Form::select('grup_id', $grup, 'S');!!} 
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Perusahaan :</strong>  
             {!!Form::select('perusahaan_id', $perusahaan, 'S');!!} 
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Nama Proyek :</strong>  
             {!!Form::select('perusahaan_id', $perusahaan, 'S');!!} 
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Semester :</strong>  
             {!!Form::select('perusahaan_id', $perusahaan, 'S');!!} 
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Tahun Ajaran :</strong>
                {!! Form::text('tahun_ajaran', null, array('placeholder' => 'Tahun Ajaran','class' => 'form-control')) !!}
        </div>
    </div>
  	<div class="col-xs-12 col-sm-12 col-md-12 text-center">
          <button type="submit" class="btn btn-primary">Submit</button>
     </div>
  </div>
</div>
  {!! Form::close() !!}
    </div>
  </div>
 </div>
</div>
@endsection