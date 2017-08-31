<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DaftarPkl;
use App\Perusahaan;
use App\Prodi;
use App\BidangPkl;
use DB;
use Auth;
use Excel;
use App\Http\Requests;

class DaftarPklController extends Controller
{
    public function index()
	{
        $daftarpkls = DB::table('daftarpkl');
		$daftarpkls = DaftarPkl::orderBy('id','ASC')->paginate(8);
        return view('daftarpkl.index', compact('daftarpkls'));
	}
	public function create()
	{
        $prodi= Prodi::lists('prodi','id');
        $perusahaan= Perusahaan::lists('nama_perusahaan','id');
        $bidangpkl= BidangPkl::lists('bidang_pkl');
		return view('daftarpkl.create',compact('perusahaan','prodi','bidangpkl'));
	}
	public function store(Request $request)
	{
		$this->validate($request, [
	        'nim' => 'required|numeric',
	        'nama_mhs' => 'required',
	        'prodi_id' => 'required',
	        'bidangpkl_id' => 'required',
	        'perusahaan_id' => 'required',
	        'nama_proyek' => 'required|numeric',
	        'semester' => 'required',
	        'tahun_ajaran' => 'required|digits_between:4,9',
	    ]);
		
		$daftarpkl = new DaftarPkl();
		$daftarpkl->nim = $request->nim;
		$daftarpkl->nama_mhs = $request->nama_mhs;
		$daftarpkl->prodi_id = $request->prodi_id;
		$daftarpkl->bidangpkl_id = $request->bidangpkl_id;
		$daftarpkl->perusahaan_id = $request->perusahaan_id;
		$daftarpkl->nama_proyek = $request->nama_proyek;
		$daftarpkl->semester = $request->semester;
		$daftarpkl->tahun_ajaran = $request->tahun_ajaran;
		$daftarpkl->save();

  		if (Auth::user()->roles()->first()->name == "Mahasiswa") {
            return redirect()->route('daftarpkl.show',Auth::id())->with('message','Data PKL Disimpan!');
        }
        return redirect()->route('daftarpkl.index')->with('message','Data pkl Inserted!');
	}
	public function show($id)
	{
        $daftarpkl=DaftarPkl::find($id);
		return view('daftarpkl.show',compact('daftarpkl'));
	}
	public function edit($id)
	{
        $perusahaan = Perusahaan::lists('nama_perusahaan','id');
        $prodi = Prodi::lists('prodi','id');
        $bidangpkl= BidangPklbidangpkl::get();

        $daftarpkl = DaftarPkl::find($id);

        return view('daftarpkl.edit',compact('prodi','perusahaan', 'daftarpkl','bidangpkl'));
	}
	public function update(Request $request, $id)
	{
		$this->validate($request, [
	        'nim' => 'required|numeric',
	        'nama_mhs' => 'required',
	        'prodi_id' => 'required',
	        'bidangpkl_id' => 'required',
	        'perusahaan_id' => 'required',
	        'nama_proyek' => 'required',
	        'semester' => 'required',
	        'tahun_ajaran' => 'required|digits_between:4,9',
	    ]);
		
		$daftarpkl = DaftarPkl::find($id);
		$daftarpkl->nim = $request->nim;
		$daftarpkl->nama_mhs = $request->nama_mhs;
		$daftarpkl->prodi_id = $request->prodi_id;
		$daftarpkl->bidangpkl_id = $request->bidangpkl_id;
		$daftarpkl->perusahaan_id = $request->perusahaan_id;
		$daftarpkl->nama_proyek = $request->nama_proyek;
		$daftarpkl->semester = $request->semester;
		$daftarpkl->tahun_ajaran = $request->tahun_ajaran;
		$daftarpkl->save();

        if (Auth::user()->roles()->first()->name == "Mahasiswa") {
            return redirect()->back()->with('message','Data PKL updated!');
        }
        return redirect()->route('daftarpkl.index')
                        ->with('message','Data pkl telah di edit!');
	}
	public function destroy($pkl)
	{
		$daftarpkl=DaftarPkl::find($id)->delete();
		return redirect()->route('daftarpkl.index')
						->with('message','Data telah di dihapus!');
	}

	public function getPdf(Request $request)
    {
        $daftarpkl = DaftarPkl::all();

        $pdf = PDF::loadView('daftarpkl/pdf',compact('daftarpkl'))
                ->setPaper('a4', 'Landscape');
                
            return $pdf->download('daftarpkl.pdf');
    }

    public function importExport()
    {
        return view('daftarpkl.importExport');
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
                    'nim' => $value->nim,
                    'prodi_id' => $value->prodi_id,
			        'bidangpkl_id' => $value->bidangpkl_id,
			        'perusahaan_id' => $value->perusahaan_id,
			        'nama_proyek' => $value->nama_proyek,
			        'semester' => $value->semester,
			        'tahun_ajaran' => $value->tahun_ajaran
                    ];
                }
                if(!empty($insert)){
                    DB::table('daftar-pkl')->insert($insert);
                    dd('Insert Data successfully.');
                }
            }
        }
        return redirect()->route('daftarpkl.index')
                        ->with('message','Data telah di diimport!');
    }

}
