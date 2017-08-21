@extends('layout.default')

@section('content')
<div class="container">
  <div class="row">
  <div class="col-md-13 col-sm-13 col-xs-16">
    <div class="x_panel">
      <div class="x_title">
        <h2>Tabel Data Grup Praktek kerja Lapangan</h2>
          <div class="clearfix"></div>
      </div>
    @if (!Auth::user()->roles()->first()->name == "Kaprodi")
      <div class="x_content">
        <a class="btn btn-success" href="{{ route('grup.create') }}"> Create New Grup</a>
      </div>
    @endif
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
@endsection