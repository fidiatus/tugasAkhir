@extends('layouts.apps')

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="x_panel">
      <div class="x_title">
        <h2> Daftar Praktek Kerja Lapangan Jurusan Teknik Sipil</h2>
        <div class="clearfix"></div>
      </div>

      <div class="panel-body">
        <div class="row">
          <div class="col-md-12 col-xs-12 col-md-12">
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
      <div class="form-group {{ $errors->has('nama_mhs') ? ' has-error' : '' }}">
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
      <div class="form-group {{ $errors->has('perusahaan_id') ? ' has-error' : '' }}">
        <strong>Instansi :</strong>  
          {!!Form::select('perusahaan_id', $perusahaan,null, array('class' => 'form-control' ));!!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group {{ $errors->has('nama_proyek') ? ' has-error' : '' }}">
        <strong>Nama Proyek :</strong>  
          {!! Form::text('nama_proyek', null, array('placeholder' => 'Nama Proyek','class' => 'form-control')) !!} 
      </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group {{ $errors->has('semester') ? ' has-error' : '' }}">
        <strong>Semester :</strong>  
          {!! Form::select('semester', ['ganjil' => 'Ganjil' , 'genap' => 'Genap'], array('class' => 'form-control')) !!}
      </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group {{ $errors->has('tahun_ajaran') ? ' has-error' : '' }}">
        <strong>Tahun Ajaran : <span class="required">*</span></strong>
              <?php $i=2010; ?>
                <select name="tahun_ajaran" class="form-control">
                    <option value=""> -- Pilih Tahun --</option>
                    @while ($i<2030)
                        <option value="{{$i=$i+1}}"> {{$i}} </option>
                    @endwhile
                </select><br/>
      </div>
    </div>
  	<div class="col-xs-12 col-sm-12 col-md-12 text-center">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <button type="submit" method="POST" class="btn btn-primary">Submit</button>
    </div>
  </div>
</div>
  {!! Form::close() !!}
    </div>
  </div>
 </div>
</div></div>
@endsection