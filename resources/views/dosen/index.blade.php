@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
  <div class="col-md-13 col-sm-13 col-xs-16">
    <div class="x_panel">
      <div class="x_title">
        <h2>Tabel Data Dosen</h2>
          <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <a class="btn btn-success" href="{{ route('pkl.create') }}"> Create New Dosen</a>
      </div>
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
@endsection