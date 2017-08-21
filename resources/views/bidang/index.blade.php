@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
      <div class="col-md-13 col-sm-13 col-xs-16">
      <div class="panel panel-default">
          <div class="panel-heading"><h4>Bidang Management</h4></div>
          
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
        <a class="btn btn-success" href="{{ route('bidang.create') }}"> Create New Bidang</a>
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
            <th> Bidang </th>
            <th> Aksi </th> 
          </tr>
        </thead>
        <tbody>
      @foreach($bidangs as $bidang)
    		  <tr>
            <td> {{$bidang->id}} </td>
            <td>{{$bidang->bidang}}</td>
            <td> 
            <a class="btn btn-info" href="{{ route('bidang.show',$bidang->id) }}">Show</a>
            <a class="btn btn-primary" href="{{ route('bidang.edit',$bidang->id) }}">Edit</a>
                    {!! Form::open(['method' => 'DELETE','route' => ['bidang.destroy', $bidang->id],'style'=>'display:inline']) !!}
                          {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                  </td> 
          </tr> 
      @endforeach
        </tbody> 
      </table>
  {!! $bidangs->render() !!}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection