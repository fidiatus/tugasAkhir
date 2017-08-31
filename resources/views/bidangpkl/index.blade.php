@extends('layouts.apps')

@section('content')
<div class="container">
  <div class="row">
      <div class="col-md-13 col-sm-13 col-xs-16">
      <div class="panel panel-default">
          <div class="panel-heading"><h4>Bidang PKL Management</h4></div>
          
    <div class="panel-body">

      <div class="panel-body">
        <form class="" action="" method="">
        <a class="btn btn-success" href="{{ route('bidangpkl.create') }}"> Create New Bidang PKL</a>
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
            <th> Bidang PKL</th>
            <th> Aksi </th> 
          </tr>
        </thead>
        <tbody>
      @foreach($bidangpkls as $bidangpkl)
    		  <tr>
            <td> {{$bidangpkl->id}} </td>
            <td>{{$bidangpkl->bidang_pkl}}</td>
            <td> 
            <a class="btn btn-info" href="{{ route('bidangpkl.show',$bidangpkl->id) }}">Show</a>
            <a class="btn btn-primary" href="{{ route('bidangpkl.edit',$bidangpkl->id) }}">Edit</a>
              {!! Form::open(['method' => 'DELETE','route' => ['bidangpkl.destroy', $bidangpkl->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                  {!! Form::close() !!}
            </td> 
          </tr> 
      @endforeach
        </tbody> 
      </table>
  {!! $bidangpkls->render() !!}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection