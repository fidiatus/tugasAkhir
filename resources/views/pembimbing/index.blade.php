@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
      <div class="col-md-13 col-sm-13 col-xs-16">
      <div class="panel panel-default">
          <div class="panel-heading"><h4>Pembimbing Management</h4></div>
          
    <div class="panel-body">
  <!-- ============= Tampilan Pencarian ============== -->
      <div class="panel-body">
        <form class="" action="" method="">
            <input type="text" name="keyword" class="form-control" placeholder="Cari sesuatu ..">
        </form>
      </div>
  <!-- =========== End =============== -->

      <div class="panel-body">
        <form class="" action="" method="">
        <a class="btn btn-success" href="{{ route('pembimbing.create') }}"> Create New Pembimbing</a>
        </form>
      </div>

  <!-- ========== tampilan Data =================== -->
    <div class="well clearfix">
      @if (count($errors) > 0)
      <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
          @foreach ($errors->all() as $error)
            <p>{{ $message }}</p>
          @endforeach
        </ul>
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
      @foreach($pembimbings as $pembimbing)
        <tr>
          <td>{{$pembimbing->id}} </td>
          <td>{{$pembimbing->user->no_induk}}</td>
          <td>{{$pembimbing->user->nama_user}}</td>
          <td>{{$pembimbing->kelas}}</td>
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
        {!! $pembimbings->links() !!} 
          </div>
        </div>
      </div>
    </div>
  </div>
</div>           
@endsection