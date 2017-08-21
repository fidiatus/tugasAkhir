@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
      <div class="col-md-13 col-sm-13 col-xs-16">
      <div class="panel panel-default">
          <div class="panel-heading"><h4>Grup PKL Management</h4></div>
          
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
        <a class="btn btn-success" href="{{ route('grup.create') }}"> Create New Grup</a>
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
          <th> Prodi </th> 
          <th> Nama User </th>
    @if (!Auth::user()->roles()->first()->name == "Kaprodi")
          <th> Aksi </th> 
    @endif
        </tr>
      </thead>
      <tbody>
    @foreach($grups as $grup)
        <tr>
            <td>{{$grup->id}} </td>
            <td>{{$grup->prodi->nama_prodi}}</td>
            <td>{{$grup->user->nama_user}}</td>

    @if (!Auth::user()->roles()->first()->name == "Kaprodi")
            <td> 
              <a class="btn btn-info" href="{{ route('grup.show',$grup->id) }}">Show</a>
              <a class="btn btn-primary" href="{{ route('grup.edit',$grup->id) }}">Edit</a>
              {!! Form::open(['method' => 'DELETE','route' => ['grup.destroy', $grup->id],'style'=>'display:inline']) !!}
                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
              {!! Form::close() !!}
            </td> 
    @endif
        </tr> 
    @endforeach
      </tbody>
    </table>
        {!! $grups->links() !!} 
          </div>
        </div>
      </div>
    </div>
  </div>
</div>           
@endsection