<?php

namespace App\Http\Controllers;
// use Maatwebsite\Excel\Facades\Excel;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Template;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Descriptor\Descriptor;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    
    // }

     public function cetak() {
        $data = DB::table('siswa')->orderBy('nama')->get();
        return view('admin.datasertif', compact('data'));
     }

    public function index()
    {
        $totalData = siswa::count();
        $template = Template::count();

        $siswa = Siswa::all();

        return view('admin.datasertif', compact('siswa'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    // public function import(Request $request)
    // {
        // $file = $request->file('file');
        // Excel::import(new Siswa, $file);
        // return back()->with('success', 'Products imported successfully.');
    //}

    // function import(Request $request){
    //     $this->validate($request, [
    //         'select_file'  => 'required|mimes:xls.xlsx'
    //     ]);

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $events = Event::all();
        return view('admin.tambah-data', compact('events'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $event = Event::findOrFail($request->event);
        // $siswa = $event->siswas()->create($request->except('event'));
        siswa::create([
            'nipd' => $request->nipd,
            'nama' => $request->nama,
            'tptlahir' => $request->tptlahir,
            'tglahir' => $request->tglahir,
            'alamat' => $request->alamat,
            'kelas' => $request->kelas,
            'kejuruan' => $request->kejuruan,
            'email' => $request->email,
            'event_id' => $request->event2,
            'dudi' => $request->dudi,
            'status' => $request->status
        ]);

        // return redirect('/admin/dataSertif')->with(['toast_success' => 'Data Berhasil Disimpan!']);
        return redirect()->route('sertif')->with(['toast_success' => 'Data Berhasil Disimpan!']);


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function cari(Request $request)
    {
        $search= $_GET['query'];
        $siswa = Siswa::where('nama', 'LIKE', '%'.$search.'%')->get();

        return view('admin.search', compact('siswa'));
                    
        // // menangkap data pencarian
        // $cari = $request->cari;

        // // mengambil data dari table pegawai sesuai pencarian data
        // $siswa = Siswa::table('siswa')
        //     ->where('siswa', 'like', "%" . $cari . "%")
        //     ->paginate();

        // // mengirim data pegawai ke view index
        // return view('admin/dataSertif', ['siswa' => $siswa]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, string $id)
    {
        $events = Event::all();
        $adm = siswa::find($id);
        return view('admin.edit-data', compact('adm', 'events'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, siswa $id)
    {
        $events = Event::findOrFail($request->event);

        $this->validate($request, [
            'nipd'       => 'required',
            'nama'       => 'required',
            'email'      => 'required',
            'kelas'      => 'required',
            'kejuruan'   => 'required',
            'alamat'     => 'required',
            'status'     => 'required',
            
        ]);

        
        // $adm = admin::find($id);
        // dd($id);
        $id->update($request->all());

        //redirect to index
        return redirect()->route('sertif')->with(['toast_success' => 'Data Berhasil Diubah!']);
        // return redirect('/admin/dataSertif');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $id = siswa::find($id);
        $id->delete();

        return back()->with('toast_success', 'Data Berhasil Dihapus!');
    }
}
