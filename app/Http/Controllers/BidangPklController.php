<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\BidangPkl;
use App\Http\Controllers\Controller;

class BidangPklController extends Controller
{
	public function index() 
	{
		$bidangpkls = BidangPkl::orderBy('id','DESC')->paginate(5);
        return view('bidangpkl.index',compact('bidangpkls'));
	}
	public function create()
	{
		return view('bidangpkl.create');
	}
	public function store(Request $request)
	{
		$this->validate($request, [
        'bidang_pkl' => 'required',
    ]);        
        BidangPkl::create($request->all());

        return redirect()->route('bidangpkl.index')
        				->with('message','bidang inserted!');
	}
	public function show($id)
	{
		$bidangpkl=BidangPkl::find($id);
		return view('bidangpkl.show',compact('bidangpkl'));
	}
	public function edit($id)
	{
		$bidangpkl= BidangPkl::find($id);
		return view('bidangpkl.edit',compact('bidangpkl'));
	}
	public function update(Request $request, $id)
	{
		$this->validate($request, [
        'bidang_pkl' => 'required',
    	]);

		BidangPkl::find($id)->update($request->all());
        return redirect()->route('bidangpkl.index')
        				->with('message','profile bidang telah di edit!');
	}
	public function destroy($id)
	{
		BidangPkl::find($id)->delete();
		return redirect()->route('bidangpkl.index')
						->with('message','Data telah di dihapus!');
	}
}