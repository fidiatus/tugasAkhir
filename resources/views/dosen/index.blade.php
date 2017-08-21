@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
      <div class="col-md-13 col-sm-13 col-xs-16">
      <div class="panel panel-default">
          <div class="panel-heading"><h4>Dosen Management</h4></div>
          
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
        <a class="btn btn-success" href="{{ route('dosen.create') }}"> Create New Dosen</a>
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
              <th> Nip </th> 
              <th> Nama </th>
              <th> Bidang </th>
              <th> Aksi </th> 
            </tr>
          </thead>
          <tbody>
          @foreach($dosens as $dosen)
            <tr>
              <td>{{$dosen->id}} </td>
              <td>{{$dosen->nip}}</td>
              <td>{{$dosen->nama_dosen}}</td>
              <td>{{$dosen->bidang->bidang}}</td>
              <td> 
              <a class="btn btn-info" href="{{ route('dosen.show',$dosen->id) }}">Show</a>
              <a class="btn btn-primary" href="{{ route('dosen.edit',$dosen->id) }}">Edit</a>
              {!! Form::open(['method' => 'DELETE','route' => ['dosen.destroy', $dosen->id],'style'=>'display:inline']) !!}
                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
              {!! Form::close() !!}
              </td> 
            </tr> 
          @endforeach
        </tbody>
      </table>
        {!! $dosens->links() !!} 
          </div>
        </div>
      </div>
    </div>    
   </div>
</div>
@endsection