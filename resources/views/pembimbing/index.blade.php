@extends('layout.default')

@section('content')
<div class="container">
  <div class="row">
  <div class="col-md-13 col-sm-13 col-xs-16">
    <div class="x_panel">
      <div class="x_title">
        <h2>Tabel Data Pembimbing</h2>
          <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <a class="btn btn-success" href="{{ route('pembimbing.create') }}"> Create New Pembimbing</a>
      </div>
    @if ($message = Session::get('success'))
      <div class="alert alert-success">
        <p>{{ $message }}</p>
      </div>
    @endif
    <table class="table table-bordered">
      <thead>
        <tr> 
          <th> ID </th>
          <th> NIM </th> 
          <th> Nama Mahasiswa</th>
          <th> Kelas </th>
          <th> Nama Dosen </th>
          <th> Prodi </th>
          <th> Aksi </th> 
        </tr>
      </thead>
      <tbody>
      @foreach($pkls as $pembimbing)
        <tr>
          <td>{{$pembimbing->id}} </td>
          <td>{{$pembimbing->nim}}</td>
          <td>{{$pembimbing->semester}}</td>
          <td>{{$pembimbing->prodi->nama_prodi}}</td>
          <td>{{$pembimbing->tahun_ajaran}}</td>
          <td>{{$pembimbing->perusahaan->nama_perusahaan}}</td>
          <td> 
            <a class="btn btn-info" href="{{ route('pembimbing.show',$pembimbing->id) }}">Show</a>
            <a class="btn btn-primary" href="{{ route('pembimbing.edit',$pembimbing->id) }}">Edit</a>
            {!! Form::open(['method' => 'DELETE','route' => ['pembimbing.destroy', $pembimbing->id],'style'=>'display:inline']) !!}
              {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
          </td> 
      @endif
        </tr> 
      @endforeach
    </tbody>
  </table>
        {!! $pkls->links() !!} 
      </div>
    </div>
  </div>
</div>           
@endsection