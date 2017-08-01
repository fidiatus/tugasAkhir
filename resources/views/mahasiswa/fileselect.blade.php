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
            <div class="well clearfix">
              <table id="datatable" class="table table-striped table-bordered">
      <thead>
            <tr> 
              <th> No </th>
              <th> NIM </th> 
              <th> Nama Mahasiswa</th>
              <th> jenis Kelamin</th>
              <th> prodi</th>
              <th> Angkatan</th>
            </tr>
          </thead>
          <tbody>
        @foreach($mahasiswa as $mahasiswa)
            <tr>
              <td> # </td>
              <td>{{$mahasiswa->no_induk}}</td>
              <td>{{$mahasiswa->nama_user}}</td>
              <td>{{$mahasiswa->jenis_kelamin}}</td>
              <td>{{$mahasiswa->prod}}</td>
              <td>{{$mahasiswa->angkatan}}</td>
            </tr>   
        @endforeach
          </tbody>    
        </table>
      </div>
      </div>
    </div>
    </div>
  </div>
 </div>
</div>
@endsection