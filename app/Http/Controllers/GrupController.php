<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Grup;
use App\User;
use App\Prodi;
use App\Http\Controllers\Controller;

class grupController extends Controller
{
	public function index() 
	{
		$grups = Grup::orderBy('id','DESC')->paginate(5);
        return view('grup.index',compact('grups'));
	}
	public function create()
	{
        $prodi = Prodi::lists('prodi','id');
        $user = User::lists('user','id');
		return view('grup.edit',compact('grup','user','prodi'));
	}
	public function store(Request $request)
	{
		$this->validate($request, [
        'grup' => 'required',
        'prodi_id' => 'required',
        'user_id' => 'required',
    ]);        
        Grup::create($request->all());

        return redirect()->route('grup.index')
        				->with('message','grup inserted!');
	}
	public function show($id)
	{
		$grup=Grup::find($id);
		return view('grup.show',compact('grup'));
	}
	public function edit($id)
	{
        $prodi = Prodi::lists('prodi','id');
        $user = User::lists('user','id');
		$grup= Grup::find($id);
		return view('grup.edit',compact('grup','user','prodi'));
	}
	public function update(Request $request, $id)
	{
		$this->validate($request, [
        'grup' => 'required',
        'prodi_id' => 'required',
        'user_id' => 'required',
    	]);

		Grup::find($id)->update($request->all());
        return redirect()->route('grup.index')
        				->with('message','profile grup telah di edit!');
	}
	public function destroy($id)
	{
		Grup::find($id)->delete();
		return redirect()->route('grup.index')
						->with('message','Data telah di dihapus!');
	}
}