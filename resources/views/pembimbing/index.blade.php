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
        <a class="btn btn-success" href="{{ route('pembimbing.pdf') }}"><i class="fa fa-download"></i> Report PDF</a>
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
      {!! Form::open(['route'=>'pembimbing.index','method'=>'GET','class'=>'navbar-form navbar-right','role'=>'search'])!!}
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
          <th> NIM </th> 
          <th> Nama Mahasiswa</th>
          <th> Bidang PKL </th>
          <th> Prodi </th>
          <th> Nama Proyek</th>
          <th> Nama Dosen </th>
          <th> Aksi </th> 
        </tr>
      </thead>
      <tbody>
      @foreach($data as $key=>$pembimbing)
        <tr>
          <td>{{++$i}} </td>
          <td>{{$pembimbing->nim}}</td>
          <td>{{$pembimbing->nama_mhs}}</td>
          <td>{{$pembimbing->bidangpkl->bidang_pkl}} </td>
          <td>{{$pembimbing->prodi->prodi}}</td>
          <td>{{$pembimbing->daftarpkl->nama_proyek}}</td>
          <td>{{$pembimbing->dosen->nama_dosen}}</td>
          <td> 
            <a class="btn btn-info" href="{{ route('pembimbing.show',$pembimbing->id) }}">Show</a>
            <a class="btn btn-primary" href="{{ route('pembimbing.edit',$pembimbing->id) }}">Edit</a>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg{{$pembimbing->id}}">Delete</button>

                  <div class="modal fade bs-example-modal-lg{{$pembimbing->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                        </div>
                        <div class="modal-body">
                          <h4>Text in a modal</h4>
                          <p>{{$pembimbing->id}}</p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          {!! Form::open(['method' => 'DELETE','route' => ['pembimbing.destroy', $pembimbing->id],'style'=>'display:inline']) !!}
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
        {!! $data->links() !!} 
          </div>
        </div>
      </div>
    </div>
  </div>
</div>           
@endsection