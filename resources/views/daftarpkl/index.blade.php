@extends('layout.default')

@section('content')
<div class="container">
  <div class="row">
   <div class="col-md-13 col-sm-13 col-xs-16">
    <div class="x_panel">
      <div class="x_title">
        <h2>Tabel Daftar Praktek Kerja Lapangan</h2>
          <div class="clearfix"></div>
      </div>
    @if (!Auth::user()->roles()->first()->name == "Kaprodi")
      <div class="x_content">
      <a class="btn btn-success" href="{{ route('daftarpkl.create') }}"> Create New PKL</a>
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
            <th> Prodi </th> 
            <th> Grup </th>
            <th> perusahaan </th>
            <th> Nama Proyek</th>
            <th> semester</th>
            <th> Tahun Ajaran </th>
      @if (!Auth::user()->roles()->first()->name == "Kaprodi")
            <th> Aksi </th> 
      @endif
          </tr>
      </thead>
      <tbody>
      @foreach($daftarpkls as $daftarpkl)
          <tr>
              <td>{{$daftarpkl->id}} </td>
              <td>{{$daftarpkl->prodi->nama_prodi}}</td>
              <td>{{$daftarpkl->grup_id}}</td>
              <td>{{$daftarpkl->perusahaan->nama_perusahaan}}</td>
              <td>{{$daftarpkl->nama_proyek}}</td>
              <td>{{$daftarpkl->semester}}</td>
              <td>{{$daftarpkl->tahun_ajaran}}</td>

      @if (!Auth::user()->roles()->first()->name == "Kaprodi")
              <td> 
              <a class="btn btn-info" href="{{ route('daftarpkl.show',$daftarpkl->id) }}">Show</a>
              <a class="btn btn-primary" href="{{ route('daftarpkl.edit',$daftarpkl->id) }}">Edit</a>
              {!! Form::open(['method' => 'DELETE','route' => ['daftarpkl.destroy', $pkl->id],'style'=>'display:inline']) !!}
                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
              {!! Form::close() !!}
                    </td> 
        @endif
                  </tr> 
                @endforeach
              </tbody>
            </table>
          </div>
            {!! $daftarpkls->links() !!} 
          </div>
          </div>
        </div>
      </div>
    </div>           
@endsection