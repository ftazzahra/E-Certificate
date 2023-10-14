<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Template;
use App\Models\Event;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $totalData = Siswa::count();
        $template = Template::count();

        $events = Event::all();
        return view('home', compact('totalData', 'template', 'events'));
    }

    public function storeE(Request $request)
    {
        // dd($request->all());
        event::create([
            'tanggalEv' => $request->tanggalEv,
            'namaEv' => $request->namaEv,
            'statusEv' => $request->statusEv,
        ]);

        // return redirect('/home')->with('toast_success', 'Data Berhasil Disimpan!');
        return redirect()->route('home');
    }   

    // public function editE(string $id){
        // $events = Event::find($id);
        // return redirect()->route('home', compact('events'));
    // }

    public function updateE(Request $request , Event $id ){
        $this->validate($request, [
            'tanggalEv'  => 'required',
            'namaEv'     => 'required',
            'statusEv'   => 'required',
        ]);

        $id->update($request->all());
        return redirect()->route('home');

    }

    public function destroyE(string $id){
        $id = Event::find($id);
        $id->delete();

        return redirect()->route('home');

    }

}
