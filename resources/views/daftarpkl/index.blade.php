@extends('layouts.apps')

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="x_panel">
      <div class="x_title">
        <h2> Data Praktek Kerja Lapangan Jurusan Teknik Sipil</h2>
        <div class="clearfix"></div>
      </div>

      <div class="panel-body">
        <div class="row">
          <div class="col-md-12 col-xs-12 col-md-12">

      <div class="panel-body">

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
      {!! Form::open(['route'=>'daftarpkl.index','method'=>'GET','class'=>'navbar-form navbar-right','role'=>'search'])!!}
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
            <th width="2%"> No </th>
            <th width="10%"> Nama Mahasiswa </th> 
            <th width="10%"> No.BP </th>
            <th width="13%"> Prodi</th>
            <th width="10%"> Bidang PKL</th>
            <th width="15%"> Instansi </th>
            <th width="20%"> Nama Proyek</th>
            @permission('delete-pkl')
            <th width="20%"> Aksi </th> 
      @endpermission
          </tr>
      </thead>
      <tbody>
    @foreach($daftarpkls as $key => $daftarpkl)
        <tr>
          <td>{{++$i}} </td>
          <td>{{$daftarpkl->nama_mhs}} </td>
          <td>{{$daftarpkl->nim}} </td>
          <td>{{$daftarpkl->prodi->prodi}}</td>
          <td>{{$daftarpkl->bidangpkl->bidang_pkl}} </td>
          <td>{{$daftarpkl->perusahaan->nama_perusahaan}}</td>
          <td>{{$daftarpkl->nama_proyek}}</td>
    @permission('edit-pkl')
          <td> 
          <a class="btn btn-info" href="{{ route('daftarpkl.show',$daftarpkl->id) }}">Show</a>
          <a class="btn btn-primary" href="{{ route('daftarpkl.edit',$daftarpkl->id) }}">Edit</a>
          @endpermission
          @permission('delete-pkl')
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg{{$daftarpkl->id}}">Delete</button>

                  <div class="modal fade bs-example-modal-lg{{$daftarpkl->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel">WARNING</h4>
                        </div>
                        <div class="modal-body">
                          <h4>Yakin akan Meghapus data {{$daftarpkl->nama_mhs}}</h4>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          {!! Form::open(['method' => 'DELETE','route' => ['daftarpkl.destroy', $daftarpkl->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            </div>
            </div>
            </div>
            </div>
          {!! Form::close() !!}
          </td> 
          @endpermission
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
  </div>      
@endsection