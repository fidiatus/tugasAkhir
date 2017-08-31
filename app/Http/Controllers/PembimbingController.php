<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Dosen;
use App\User;
use App\Role;
use App\Prodi;
use App\DaftarPkl;
use App\Pembimbing;
use App\Http\Controllers\Controller;

class PembimbingController extends Controller
{
	public function index(Request $request) 
	{
        $data = Pembimbing::orderBy('id','DESC')->paginate(5);
        return view('pembimbing.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
	}
	public function create()
	{
        $user= new User;
        $mahasiswa = Role::with('users')->where('name','Mahasiswa')->first();
        $dosen= Dosen::lists('nama_dosen','id');
        $prodi= Prodi::lists('prodi','id');
        $daftarpkl= DaftarPkl::lists('nama_proyek','id');
		return view('pembimbing.create',compact('mahasiswa','dosen','prodi','daftarpkl'));
	}
	public function store(Request $request)
	{
		$this->validate($request, [
        'user_id' => 'required',
        'kelas' => 'required',
        'dosen_id' => 'required',
        'prodi_id' => 'required',
        'daftarpkl_id' => 'required',

    ]);  
        $pembimbing = new Pembimbing();
        $pembimbing->user_id = $request->input('user_id');
        $pembimbing->kelas = $request->input('kelas');
        $pembimbing->dosen_id = $request->input('dosen_id');
        $pembimbing->prodi_id = $request->input('prodi_id');
        $pembimbing->daftarpkl_id = $request->input('daftarpkl_id');
        $pembimbing->save();

        Pembimbing::create($request->all());

        return redirect()->route('pembimbing.index')
        				->with('message','pembimbing inserted!');
	}
	public function show($id)
	{
		$pembimbing=Pembimbing::find($id);
		return view('pembimbing.show',compact('pembimbing'));
	}
	public function edit($id)
	{
        $user= User::lists('no_induk','id');
        $users= User::lists('nama_user','id');
        $dosen= Dosen::lists('nama_dosen','id');
        $prodi= Prodi::lists('prodi','id');
        $daftarpkl= Prodi::lists('nama_proyek','id');

        $pembimbing = Pembimbing::find($id);
		return view('pembimbing.edit',compact('user','users','dosen','prodi','daftarpkl','pembimbing'));
	}
	public function update(Request $request, $id)
	{
		$this->validate($request, [
        'user_id' => 'required|numeric',
        'users_id' => 'required',
        'kelas' => 'required',
        'dosen_id' => 'required',
        'prodi_id' => 'required',
        'daftarpkl_id' => 'required',
    ]);  
        $pembimbing = Pembimbing::find($id);
        $pembimbing->user_id = $request->input('user_id');
        $pembimbing->users_id = $request->input('users_id');
        $pembimbing->kelas = $request->input('kelas');
        $pembimbing->dosen_id = $request->input('dosen_id');
        $pembimbing->prodi_id = $request->input('prodi_id');
        $pembimbing->daftarpkl_id = $request->input('daftarpkl_id');
        $pembimbing->save();

		Pembimbing::find($id)->update($request->all());
        return redirect()->route('pembimbing.index')
        				->with('message','profile pembimbing telah di edit!');
	}
	public function destroy($id)
	{
		Pembimbing::find($id)->delete();
		return redirect()->route('pembimbing.index')
						->with('message','Data telah di dihapus!');
	}

    public function getPdf(Request $request)
    {
        $pembimbing = Pembimbing::all();

        $pdf = PDF::loadView('pembimbing/pdf',compact('pembimbing'))
                ->setPaper('a4', 'Landscape');
                
            return $pdf->download('pembimbing.pdf');
    }

    public function importExport()
    {
        return view('pembimbing.importExport');
    }

    public function downloadExcel($type)
    {
        $data = Pembimbing::get()->toArray();
        return Excel::create('itsolutionstuff_example', function($excel) use ($data) {
            $excel->sheet('mySheet', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->download($type);
    }

    public function importExcel()
    {
        if(Input::hasFile('import_file')){
            $path = Input::file('import_file')->getRealPath();
            $data = Excel::load($path, function($reader) {
            })->get();
            if(!empty($data) && $data->count()){
                foreach ($data as $key => $value) {
                    $insert[] = [
                    'user_id' => $value->user_id, 
                    'kelas' => $value->kelas,
                    'dosen_id' => $value->dosen_id,
                    'prodi_id' => $value->prodi_id,
                    'daftarpkl_id' => $value->daftarpkl_id
                    ];
                }
                if(!empty($insert)){
                    DB::table('pembimbing')->insert($insert);
                    dd('Insert Data successfully.');
                }
            }
        }
        return redirect()->route('pembimbing.index')
                        ->with('message','Data telah di diimport!');
    }
}