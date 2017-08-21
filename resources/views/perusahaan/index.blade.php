@extends('layout.default')

@section('content')
<div class="container">
  <div class="row">
  <div class="col-md-13 col-sm-13 col-xs-16">
    <div class="x_panel">
      <div class="x_title">
        <h2>Tabel Data Perusahaan</h2>
          <div class="clearfix"></div>
      </div>      
    @if (!Auth::user()->roles()->first()->name == "Mahasiswa" || !Auth::user()->roles()->first()->name =="Dosen")
        <div class="x_content">
          <a class="btn btn-success" href="{{ route('perusahaan.create') }}"> Create New Perusahaan</a>
        </div>
    @endif
    
  @if ($message = Session::get('success'))
    <div class="alert alert-success">
      <p>{{ $message }}</p>
    </div>
  @endif
    <table class="table table-bordered">
      <thead>
          <tr> 
            <th> ID </th>
            <th> Nama Perusahaan </th> 
            <th> Email </th>
            <th> Telp </th>
            <th> Alamat </th>
      @if (!Auth::user()->roles()->first()->name == "Mahasiswa" || !Auth::user()->roles()->first()->name =="Dosen")
            <th> Aksi </th> 
      @endif
          </tr>
      </thead>
      <tbody>
        @foreach($perusahaans as $perusahaan)
          <tr>
              <td> {{$perusahaan->id}} </td>
              <td>{{$perusahaan->nama_perusahaan}}</td>
              <td>{{$perusahaan->email}}</td>
              <td>{{$perusahaan->telepon}}</td>
              <td>{{$perusahaan->alamat}}</td>
    @if (!Auth::user()->roles()->first()->name == "Mahasiswa" || !Auth::user()->roles()->first()->name =="Dosen")
              <td>
                <a class="btn btn-info" href="{{ route('perusahaan.show',$perusahaan->id) }}">Show</a>
                <a class="btn btn-primary" href="{{ route('perusahaan.edit',$perusahaan->id) }}">Edit</a>
                  {!! Form::open(['method' => 'DELETE','route' => ['perusahaan.destroy', $perusahaan->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                  {!! Form::close() !!}
              </td> 
    @endif
          </tr> 
        @endforeach
      </tbody>
  </table>
        {!! $perusahaans->links() !!} 
      </div>
    </div>
  </div>
</div>           
@endsection  