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
				<form class="form form-horizontal"  method="post" role="form" action="{{route('select.filterdosen')}}">
				  <div class="form-group"> 
				  	<h3 class="center"> Report Data Dosen Pembimbing </h3><br/>
					<label> Tahun Ajaran </label>
					<select name="daftarpkl" class="form-control">
						@foreach($daftarpkl as $daftarpkl)
							<option value="{{$daftarpkl->tahun_ajaran}}">{{$daftarpkl->tahun_ajaran}}</option> 
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