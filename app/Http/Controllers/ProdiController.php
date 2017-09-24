<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Prodi;
use App\Http\Controllers\Controller;

class ProdiController extends Controller
{
	public function index(Request $request) 
	{
		$prodis = Prodi::where(function($query) use ($request)
        {
            if( ($term=$request ->get('term'))) {
                $query->orWhere('prodi','like','%'.$term.'%');
            }
        })
        ->orderBy('id','DESC')
        ->paginate(10);

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
		if (!$prodi) {
        	abort(403);
        	}
		return view('prodi.show',compact('prodi'));
	}
	public function edit($id)
	{
		$prodi= Prodi::find($id);
		return view('prodi.edit',compact('prodi'));
	}
	public function update(Request $request, $id)
	{
		$this->validate($request, [
        'prodi' => 'required',
    	]);

        $prodi = Prodi::find($id);
        $prodi->prodi = $request->input('prodi');
        $prodi->save();

		Prodi::find($id)->update($request->all());
        return redirect()->route('prodi.index')
        				->with('message','profile prodi telah di edit!');
	}
	public function destroy($id)
	{
		Prodi::find($id)->delete();
		return redirect()->route('prodi.index')
						->with('message','Data telah di dihapus!');
	}
}