@extends('layouts.apps')


@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="x_panel">
      <div class="x_title">
        <h2> Data Mahasiswa Jurusan Teknik Sipil</h2>
        <div class="clearfix"></div>
      </div>

      <div class="panel-body">
        <div class="row">
          <div class="col-md-12 col-xs-12 col-md-12">       
        <div class="panel-body">       
            <a class="btn btn-primary" href="{{ route('mahasiswa.edit',[$mahasiswa->id]) }}">Edit</a>
      </div>
  <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nomor Induk:</strong>
                <input type="text" class="form-control" readonly="readonly" placeholder="{{ $mahasiswa->no_induk }}">    
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama:</strong>
                <input type="text" class="form-control" readonly="readonly" placeholder="{{ $mahasiswa->nama_user }}">     
            </div>
        </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Username:</strong>
                <input type="text" class="form-control" readonly="readonly" placeholder="{{ $mahasiswa->username }}">     
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                <input type="text" class="form-control" readonly="readonly" placeholder="{{ $mahasiswa->email }}">     
            </div>
        </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="form-group">
              <strong>Jenis Kelamin :</strong>
                <input type="radio" name="jenis_kelamin" id="lk" value="lk" checked>Pria
              <input type="radio" name="jenis_kelamin" id="pr" value="pr"> Wanita     
          </div>
      </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Program Studi:</strong>
                <input type="text" class="form-control" readonly="readonly" placeholder="{{  $mahasiswa->prodi->prodi}}">   
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tahun Angkatan:</strong>
                <input type="text" class="form-control" readonly="readonly" placeholder="{{ $mahasiswa->angkatan }}">     
            </div>
        </div>      
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nomor Handphone:</strong>
                <input type="text" class="form-control" readonly="readonly" placeholder="{{ $mahasiswa->no_hp }}">     
            </div>
        </div>       
  </div>
    </div>
    </div>
    </div>
    </div>
    </div></div>
@endsection