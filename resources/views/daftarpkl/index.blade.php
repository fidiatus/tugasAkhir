@extends('layouts.apps')

@section('content')
<div class="container">
  <div class="row">
      <div class="col-md-13 col-sm-13 col-xs-16">
      <div class="panel panel-default">
          <div class="panel-heading"><h4>PKL Management</h4></div>
          
    <div class="panel-body">

      <div class="panel-body">
        <form class="" action="" method="">
        <a class="btn btn-success" href="{{ route('daftarpkl.create') }}"> Create New PKL</a>
        <a class="btn btn-success" href="{{ route('daftarpkl/pdf') }}"> Report PDF</a>
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
    {!! $daftarpkls->links() !!} 
            </div>
          </div>
        </div>
      </div>
    </div>   
  </div>        
@endsection