@extends('layouts.apps')

@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Sistem Informasi Praktek Kerja Lapangan Jurusan Teknik Sipil</h2>
        <div class="clearfix"></div>
      </div>

      <div class="panel-body">
        <div class="row">
          <div class="col-md-6 col-xs-12">
          	<div class="x_panel">
              <div class="x_title">
				<form class="form form-horizontal"  method="post" role="form" action="{{route('select.filter.perusahaan')}}">
					<h3>Report Data PKL</h3>
				  <div class="form-group"> 
					<label> Tahun Ajaran</label>
					<select name="th" class="form-control">
						@foreach($th as $th)
							<option value="{{$th->tahun_ajaran}}">{{$th->tahun_ajaran}}</option> 
						@endforeach
					</select><br/>

					<input type="hidden" name="_token" value="{{csrf_token()}}">
					<button name="submit" type="submit">Submit</button>
				  </div>
				</form>
			  </div>
			</div>
		  </div>
		</div>
	  </div>
    </div>
  </div>
</div>
@endsection