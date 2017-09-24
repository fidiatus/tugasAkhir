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
	        <a class="btn btn-primary" href="{{ route('mahasiswa.show',[$mahasiswa->id]) }}"> Back</a>
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
	{!! Form::model($mahasiswa, ['method' => 'PATCH','route' => ['mahasiswa.update', $mahasiswa->id]]) !!}
	<div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Nomor Induk :</strong>
                {!! Form::text('no_induk', null, array('placeholder' => 'Nomor Induk','class' => 'form-control')) !!}
                <br/>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama :</strong>
                {!! Form::text('nama_user', null, array('placeholder' => 'Nama','class' => 'form-control')) !!} 
                <br/>
            </div>
        </div>
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Username:</strong>
                {!! Form::text('username', null, array('placeholder' => 'Username','class' => 'form-control')) !!}  
                <br/>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}   
                <br/>
            </div>
        </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Jenis Kelamin :</strong>
              <input type="radio" name="jenis_kelamin" id="lk" value="lk" checked>Pria
              <input type="radio" name="jenis_kelamin" id="pr" value="pr"> Wanita  
                <br/>
        </div>
    </div>
     <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Program Studi:<span class="required">*</span></strong>
             {!!Form::select('prodi_id', $prodi, $mahasiswa->prodi_id,array('class' => 'form-control' ));!!}            
                <br/>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Tahun Angkatan :<span class="required">*</span></strong>            
              <?php $i=2000; ?>
                <select name="angkatan" class="form-control" value="{{ $mahasiswa->angkatan }}">
                    <option value=""> -- Pilih Tahun --</option>
                    @while ($i<2050)
                        <option value="{{$i=$i+1}}"> {{$i}} </option>
                    @endwhile
                </select><br/>
        </div>
    </div>    
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Nomor Handphone :</strong>
                {!! Form::text('no_hp', null, array('placeholder' => 'HP','class' => 'form-control')) !!}  
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
    </div></div>
@endsection