@extends('layouts.apps')

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="x_panel">
      <div class="x_title">
        <h2> Data Dosen Jurusan Teknik Sipil</h2>
        <div class="clearfix"></div>
      </div>

      <div class="panel-body">
        <div class="row">
          <div class="col-md-12 col-xs-12 col-md-12">
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
  <!-- ============= Tampilan Pencarian ============== -->
      
    <div class="title_right">
      <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
      {!! Form::open(['route'=>'dosen.index','method'=>'GET','class'=>'navbar-form navbar-right','role'=>'search'])!!}
        <div class="input-grup">
        {!!Form::text('term',Request::get('term'),['class'=>'form-control','placeholder'=>'Search...'])!!}
        <span class="input-btn-group">
            <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button></span> 
        </div>
      </div></div>
      {!! Form::close()!!}
  <!-- =========== End =============== -->
        <table class="table table-bordered">
          <thead>
            <tr> 
              <th> No </th>
              <th> Nip </th> 
              <th> Nama Dosen </th>
              <th> Bidang </th>
              <th> Aksi </th> 
            </tr>
          </thead>
          <tbody>
          @foreach($dosens as $key => $dosen)
            <tr>
              <td>{{ ++$i }} </td>
              <td>{{$dosen->nip}}</td>
              <td>{{$dosen->nama_dosen}}</td>
              <td>{{$dosen->bidang->nama_bidang}}</td>
              @permission('edit-dosen')
              <td> 
              <a class="btn btn-info" href="{{ route('dosen.show',$dosen->id) }}">Show</a>
              <a class="btn btn-primary" href="{{ route('dosen.edit',$dosen->id) }}">Edit</a>
              @endpermission
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg{{$dosen->id}}">Delete</button>

                  <div class="modal fade bs-example-modal-lg{{$dosen->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel">WARNING</h4>
                        </div>
                        <div class="modal-body">
                          <h4>Yakin akan Meghapus data {{$dosen->nama_dosen}}</h4>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          {!! Form::open(['method' => 'DELETE','route' => ['dosen.destroy', $dosen->id],'style'=>'display:inline']) !!}
                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                </div>
                </div>
                </div>
                </div>
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
</div></div>
@endsection