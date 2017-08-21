@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
      <div class="col-md-13 col-sm-13 col-xs-16">
      <div class="panel panel-default">
          <div class="panel-heading"><h4>Perusahaan Management</h4></div>
          
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
        <a class="btn btn-success" href="{{ route('perusahaan.create') }}"> Create New Perusahaan</a>
        </form>
      </div>

  <!-- ========== tampilan Data =================== -->
    <div class="well clearfix">
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
  </div>
</div>           
@endsection  