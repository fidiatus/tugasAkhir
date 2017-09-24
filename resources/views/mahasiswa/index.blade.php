@extends('layouts.apps')

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="x_panel">
      <div class="x_title">
        <h2> Data Mahasiswa Jurusan Teknik Sipil</h2>
        <div class="clearfix"></div>
      </div>

      <div class="panel-body">
        <div class="row">
          <div class="col-md-12 col-xs-12 col-md-12">

  <!-- ========== tampilan Data =================== -->
    <div class="well clearfix">
    @if ($message = Session::get('success'))
      <div class="alert alert-success">
        <p>{{ $message }}</p>
      </div>
    @endif
      <table id="datatable" class="table table-striped table-bordered">
        <thead>
          <tr> 
            <th> No </th>
            <th> NO.BP </th>
            <th> Nama Mahasiswa </th>
            <th> Program Studi </th>
            <th> Aksi </th> 
          </tr>
        </thead>
        <tbody>
      @foreach($mahasiswas as $key => $mahasiswa)
          <tr>
            <td> {{++$i}} </td>
            <td>{{$mahasiswa->no_induk}}</td>
            <td>{{$mahasiswa->nama_user}}</td>
            <td>{{$mahasiswa->prodi->prodi}}</td>
            <td> 
            <a class="btn btn-info" href="{{ route('mahasiswa.show',$mahasiswa->id) }}">Show</a>
            @permission('delete-mahasiswa')            
            <a class="btn btn-primary" href="{{ route('mahasiswa.edit',$mahasiswa->id) }}">Edit</a>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg{{$mahasiswa->id}}">Delete</button>

                  <div class="modal fade bs-example-modal-lg{{$mahasiswa->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel">Warning</h4>
                        </div>
                        <div class="modal-body">
                          <h4>Text in a modal</h4>
                          <p>{{$mahasiswa->nama_user}}</p>
                          
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          {!! Form::open(['method' => 'DELETE','route' => ['mahasiswa.destroy', $mahasiswa->id],'style'=>'display:inline']) !!}
                          {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                        </div>
                        </div>
                        </div>
                        </div>
                        @endpermission
                        @if($mahasiswa->pbb==0)
                          {!! Form::open(['method' => 'post','route' => ['pembimbing.create'], 'style'=>'display:inline']) !!}
                          {!! Form::submit('Tambah Pembimbing', ['class' => 'btn btn-success']) !!}                          
                          <input type="hidden" name="nim" value="{{ $mahasiswa->no_induk }}">
                          <input type="hidden" name="nama_mhs" value="{{ $mahasiswa->nama_user }}">
                        {!! Form::close() !!}
                        @elseif($mahasiswa->pbb>0)
                          Telah Ada Pembimbing
                        @endif

                  </td> 
          </tr> 
      @endforeach
        </tbody> 
      </table>

          </div>
        </div>
      </div>
    </div>
  </div>
</div></div>
@endsection

