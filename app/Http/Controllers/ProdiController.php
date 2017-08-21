<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Prodi;
use App\Http\Requests;

class ProdiController extends Controller
{
     public function index(Request $request)
    {
        $prodis = Prodi::orderBy('id','DESC')->paginate(5);
        return view('prodi.index',compact('prodis'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    public function create()
	{
		return view('prodi.create');
	}
	public function store(Request $request)
	{
		$this->validate($request, [
        'prodi' => 'required',
    ]);
		Prodi::create($request->all());

        return redirect()->route('prodi.index')
        				->with('message','prodi inserted!');
	}
	public function show($id)
	{
        $prodi=Prodi::find($id);
		
		return view('prodi.show',compact('prodi'));
	}
	public function edit($id)
	{
        $prodi=Prodi::find($id);
		return view('prodi.edit',compact('prodi'));
	}
	public function update(Request $request, $id)
	{
		$this->validate($request, [
              'prodi' => 'required',
    	]);
		Prodi::where('id', $id)->update([
			'prodi' => $request->prodi
		]);
        
        return redirect()->route('prodi.index')
        				->with('message','prodi Updated!');
	}
	public function destroy($prodi)
	{
		$prodi=Prodi::find($prodi);
		$prodi->delete();
		return redirect()->route('prodi')
						->with('message','Data telah di dihapus!');
	}
}
