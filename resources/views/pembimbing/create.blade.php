@extends('layouts.apps')

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="x_panel">
      <div class="x_title">
        <h2> Tambah Data Pembimbing Jurusan Teknik Sipil</h2>
        <div class="clearfix"></div>
      </div>

      <div class="panel-body">
        <div class="row">
          <div class="col-md-12 col-xs-12 col-md-12">
      <div class="panel-body">
        <a class="btn btn-primary" href="{{ route('mahasiswa.index') }}"> Back</a>
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
                {!! Form::text('nama_mhs', $nama_mhs, array('placeholder' => 'Nama Mahasiswa','class' => 'form-control','readonly'=>'readonly')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Nomor Induk Mahasiswa :</strong>
                {!! Form::text('nim', $nim, array('placeholder' => 'NIM','class' => 'form-control','readonly'=>'readonly')) !!}
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
            <select name="daftarpkl" class="form-control"> 
             @foreach($daftarpkl as $daftarpkl)
                <option value="{{$daftarpkl->id}}">{{$daftarpkl->nama_mhs}} Proyek {{$daftarpkl->nama_proyek}}</option> 
             @endforeach
           </select>
                
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Nama Instansi:</strong>            
             {!!Form::select('perusahaan_id', $perusahaan, null,array('class' => 'form-control'))!!}
        </div>
    </div> 
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Nama Dosen Pembimbing:</strong>
             {!!Form::select('dosen_id', $dosen, null,array('class' => 'form-control'))!!}
                
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
    </div>
  </div>
</div></div>
@endsection