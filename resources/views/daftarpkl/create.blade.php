@extends('layouts.apps')

@section('content')
<div class="container">
 <div class="row">
      <div class="col-md-13 col-sm-13 col-xs-16">
      <div class="panel panel-default">
          <div class="panel-heading"><h4>Daftar Praktek Kerja Lapangan</h4></div>
          
    <div class="panel-body">
  {!! Form::open(array('route' => 'daftarpkl.store','method'=>'POST')) !!}
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group {{ $errors->has('nim') ? ' has-error' : '' }}">
        <strong>Nama Mahasiswa :</strong>
          {!! Form::text('nama_mhs', null, array('placeholder' => 'Nama Mahasiswa','class' => 'form-control')) !!} 
      </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group {{ $errors->has('nim') ? ' has-error' : '' }}">
        <strong>Nomor Induk Mahasiswa :</strong>
          {!! Form::text('nim', null, array('placeholder' => 'NIM','class' => 'form-control')) !!} 
      </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group {{ $errors->has('prodi_id') ? ' has-error' : '' }}">
        <strong>Program Studi :</strong>
          {!!Form::select('prodi_id', $prodi,null, array('class' => 'form-control'));!!} 
      </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group {{ $errors->has('bidangpkl_id') ? ' has-error' : '' }}">
        <strong>Bidang Praktek Kerja Lapangan :</strong>
          {!!Form::select('bidangpkl_id', $bidangpkl,null, array('class' => 'form-control' ));!!} 
      </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group">
        <strong>Perusahaan :</strong>  
          {!!Form::select('perusahaan_id', $perusahaan,null, array('class' => 'form-control' ));!!} 
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group">
        <strong>Nama Proyek :</strong>  
          {!! Form::text('nama_proyek', null, array('placeholder' => 'Nama Proyek','class' => 'form-control')) !!} 
      </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group">
        <strong>Semester :</strong>  
          {!! Form::select('semester', ['ganjil' => 'Ganjil' , 'genap' => 'Genap'], array('class' => 'form-control')) !!}
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