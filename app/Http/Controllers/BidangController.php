<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Bidang;
use App\Http\Controllers\Controller;

class BidangController extends Controller
{
	public function index(Request $request) 
	{
		$bidangs = Bidang::where(function($query) use ($request)
        {
            if( ($term=$request ->get('term'))) {
                $query->orWhere('nama_bidang','like','%'.$term.'%');
            }
        })
        ->orderBy('id','DESC')
        ->paginate(10);
        
        return view('bidang.index',compact('bidangs'))
    				->with('i', ($request->input('page', 1) - 1) * 5);
	}
	public function create()
	{
		return view('bidang.create');
	}
	public function store(Request $request)
	{
		$this->validate($request, [
        'nama_bidang' => 'required',
    ]);        
        Bidang::create($request->all());

        return redirect()->route('bidang.index')
        				->with('message','bidang inserted!');
	}
	public function show($id)
	{
		$bidang=Bidang::find($id);
		return view('bidang.show',compact('bidang'));
	}
	public function edit($id)
	{
		$bidang= Bidang::find($id);
		return view('bidang.edit',compact('bidang'));
	}
	public function update(Request $request, $id)
	{
		$this->validate($request, [
        'nama_bidang' => 'required',
    	]);

		Bidang::find($id)->update($request->all());
        return redirect()->route('bidang.index')
        				->with('message','profile bidang telah di edit!');
	}
	public function destroy($id)
	{
		Bidang::find($id)->delete();
		return redirect()->route('bidang.index')
						->with('message','Data telah di dihapus!');
	}
}