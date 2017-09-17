@extends('layouts.apps')

@section('content')

<div class="row">
	<div class="panel-body">
		<form class="form form-horizontal"  method="post" role="form" action="{{route('select.filter')}}">
			<div class="form-group">
				<label> Prodi </label>
				<select name="prodi" class="form-control">
					@foreach($prodi as $prodi)
						<option value="{{$prodi->id}}">{{$prodi->prodi}}</option> 
					@endforeach
				</select>
				<select name="bidangpkl" class="form-control">
					@foreach($bidangpkl as $bidangpkl)
						<option value="{{$bidangpkl->id}}">{{$bidangpkl->bidang_pkl}}</option> 
					@endforeach
				</select>
				<select name="daftarpkl" class="form-control">
					@foreach($daftarpkl as $pkl)
						<option value="{{$pkl->tahun_ajaran}}">{{$pkl->tahun_ajaran}}</option> 
					@endforeach
				</select>

				<input type="hidden" name="_token" value="{{csrf_token()}}">
				<button name="submit" type="submit">Submit</button>
			</div>
		</form>
	</div>
</div>
@endsection