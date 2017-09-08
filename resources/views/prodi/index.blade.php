@extends('layouts.apps')

@section('content')
<div class="container">
  <div class="row">
      <div class="col-md-13 col-sm-13 col-xs-16">
      <div class="panel panel-default">
          <div class="panel-heading"><h4>Prodi Management</h4></div>
          
    <div class="panel-body">

      <div class="panel-body">
        <form class="" action="" method="">
        <a class="btn btn-success" href="{{ route('prodi.create') }}"> Create New Prodi</a>
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
            <th> Program Studi </th>
            <th> Aksi </th> 
          </tr>
        </thead>
        <tbody>
      @foreach($prodis as $prodi)
          <tr>
            <td> {{$prodi->id}} </td>
            <td>{{$prodi->prodi}}</td>
            <td> 
            <a class="btn btn-info" href="{{ route('prodi.show',$prodi->id) }}">Show</a>
            <a class="btn btn-primary" href="{{ route('prodi.edit',$prodi->id) }}">Edit</a>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg{{$prodi->id}}">Delete</button>

                  <div class="modal fade bs-example-modal-lg{{$prodi->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                        </div>
                        <div class="modal-body">
                          <h4>Text in a modal</h4>
                          <p>{{$prodi->id}}</p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          {!! Form::open(['method' => 'DELETE','route' => ['prodi.destroy', $prodi->id],'style'=>'display:inline']) !!}
                          {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                        </div>
                        </div>
                        </div>
                        </div>
                  </td> 
          </tr> 
      @endforeach
        </tbody> 
      </table>
  {!! $prodis->render() !!}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection