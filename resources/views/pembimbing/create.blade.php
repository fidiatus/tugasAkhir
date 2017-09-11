@extends('layouts.apps')

@section('content')
<div class="container">
 <div class="row">
      <div class="col-md-13 col-sm-13 col-xs-16">
      <div class="panel panel-default">
          <div class="panel-heading"><h4>Pembimbing PKL</h4></div>
          
    <div class="panel-body">
      <div class="panel-body">
        <a class="btn btn-primary" href="{{ route('pembimbing.index') }}"> Back</a>
      </div>
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
  {!! Form::open(array('route' => 'pembimbing.store','method'=>'POST')) !!}
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Nama Mahasiswa :</strong>
                {!! Form::text('nama_mhs', null, array('placeholder' => 'Nama Mahasiswa','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Nomor Induk Mahasiswa :</strong>
                {!! Form::text('nim', null, array('placeholder' => 'NIM','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Bidang Praktek Kerja lapangan :</strong>
                {!! Form::select('bidangpkl_id', $bidangpkl, null,array('class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Program Studi :</strong>  
             {!!Form::select('prodi_id', $prodi, null,array('class' => 'form-control'))!!} 
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Nama Proyek :</strong>  
             {!!Form::select('daftarpkl_id', $daftarpkl, null,array('class' => 'form-control'))!!} 
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Nama Dosen Pembimbing:</strong>
             {!!Form::select('dosen_id', $dosen, null,array('class' => 'form-control'))!!}
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