@extends('layouts.apps')

@section('content')
<div class="container">
  <div class="row">
      <div class="col-md-13 col-sm-13 col-xs-16">
      <div class="panel panel-default">
          <div class="panel-heading"><h4>Pembimbing Management</h4></div>
          
    <div class="panel-body">

      <div class="panel-body">
        <form class="" action="" method="">
        <a class="btn btn-success" href="{{ route('pembimbing.create') }}"> Create New Pembimbing</a>
        <a class="btn btn-success" href="{{ route('pembimbing/pdf') }}"> Report PDF</a>
        </form>
      </div>

  <!-- ========== tampilan Data =================== -->
    <div class="well clearfix">
  @if ($message = Session::get('success'))
    <div class="alert alert-success">
      <p>{{ $message }}</p>
    </div>
  @endif
  <!-- ============= Tampilan Pencarian ============== -->
      <div class="panel-body">
        <form class="" action="" method="">
            <input type="text" name="keyword" class="form-control" placeholder="Cari sesuatu ..">
        </form>
      </div>
  <!-- =========== End =============== -->
    <table class="table table-bordered">
      <thead>
        <tr> 
          <th> ID </th>
          <th> NIM </th> 
          <th> Nama Mahasiswa</th>
          <th> Tempat PKL </th>
          <th> Nama Dosen </th>
          <th> Prodi </th>
          <th> Aksi </th> 
        </tr>
      </thead>
      <tbody>
      @foreach($data as $pembimbing)
        <tr>
          <td>{{$pembimbing->id}} </td>
          <td>{{$pembimbing->nim}}</td>
          <td>{{$pembimbing->nama_mhs}}</td>
          <td>{{$pembimbing->daftarpkl->}}</td>
          <td>{{$pembimbing->dosen->nama_dosen}}</td>
          <td>{{$pembimbing->prodi->prodi}}</td>
          <td> 
            <a class="btn btn-info" href="{{ route('pembimbing.show',$pembimbing->id) }}">Show</a>
            <a class="btn btn-primary" href="{{ route('pembimbing.edit',$pembimbing->id) }}">Edit</a>
            {!! Form::open(['method' => 'DELETE','route' => ['pembimbing.destroy', $pembimbing->id],'style'=>'display:inline']) !!}
              {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
          </td> 
        </tr> 
      @endforeach
    </tbody>
  </table>
        {!! $data->links() !!} 
          </div>
        </div>
      </div>
    </div>
  </div>
</div>           
@endsection