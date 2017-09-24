<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Dosen;
use App\Bidang;
use App\Http\Controllers\Validator;
use App\Http\Controllers\Controller;

class DosenController extends Controller
{
	public function index(Request $request) 
	{
		$dosens = Dosen::where(function($query) use ($request)
		{
			if( ($term=$request ->get('term'))) {
				$query->orWhere('nip','like','%'.$term.'%');
				$query->orWhere('nama_dosen','like','%'.$term.'%');
				$query->orWhere('bidang_id','like','%'.$term.'%');
			}
		})
		->orderBy('id','DESC')
		->paginate(10);
		
        return view('dosen.index',compact('dosens'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
	}
	public function create()
	{
        $bidang= Bidang::lists('nama_bidang','id');
		return view('dosen.create',compact('bidang'));
	}
	public function store(Request $request)
	{
		$this->validate($request, [
        'nip' => 'required|numeric',
        'nama_dosen' => 'required',
        'bidang_id' => 'required',
    ]);          
        $dosen = new Dosen();
        $dosen->nip = $request->input('nip');
        $dosen->nama_dosen = $request->input('nama_dosen');
        $dosen->bidang_id = $request->input('bidang_id');
        $dosen->save();

        return redirect()->route('dosen.index')
        				->with('message','dosen inserted!');	
        
	}

	public function show($id)
	{
		$dosen=Dosen::find($id);
		if (!$dosen) {
        	abort(403);
        	}
		return view('dosen.show',compact('dosen'));
	}
	public function edit($id)
	{
		$dosen=Dosen::find($id);
        $bidang= Bidang::lists('nama_bidang','id');
		return view('dosen.edit',compact('bidang','dosen'));
	}
	public function update(Request $request, $id)
	{
		$this->validate($request, [
        'nip' => 'required|numeric|unique:dosen',
        'nama_dosen' => 'required',
        'bidang_id' => 'required',
    	]);
		$dosen = Dosen::find($id);
		$dosen->nip = $request->nip;
		$dosen->nama_dosen = $request->nama_dosen;
		$dosen->bidang_id = $request->bidang_id;
		$dosen->save();

		// Dosen::find($id)->update($request->all());
        return redirect()->route('dosen.index')
        				->with('message','profile dosen telah di edit!');
	}
	public function destroy($id)
	{
		Dosen::find($id)->delete();
		return redirect()->route('dosen.index')
						->with('message','Data telah di dihapus!');
	}
}