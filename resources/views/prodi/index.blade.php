@extends('layout.default')

@section('content')
<div class="container">
  <div class="row">
  <div class="col-md-13 col-sm-13 col-xs-16">
    <div class="x_panel">
      <div class="x_title">
        <h2>Tabel Data<small>Program Studi</small></h2>
          <div class="clearfix"></div>
      </div>
          <div class="x_content">
          <a class="btn btn-success" href="{{ route('prodi.create') }}"> Create New Prodi</a>
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
            <th> Nama Prodi </th>
            <th> Aksi </th> 
          </tr>
        </thead>
        <tbody>
        		@foreach($prodis as $prodi)
    		  <tr>
            <td> {{$prodi->id}} </td>
            <td>{{$prodi->nama_prodi}}</td>
            <td> 
            <a class="btn btn-info" href="{{ route('prodi.show',$prodi->id) }}">Show</a>
            <a class="btn btn-primary" href="{{ route('prodi.edit',$prodi->id) }}">Edit</a>
            {!! Form::open(['method' => 'DELETE','route' => ['prodi.destroy', $prodi->id],'style'=>'display:inline']) !!}
                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
                  </td> 
                  </tr> 
            @endforeach
        </tbody>
      </table>
    {!! $prodis->links() !!} 
      </div>
    </div>
  </div>
</div>           
@endsection