<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;

class PrintController extends Controller
{
    public function index()
    {
        return view('template.sertifikat');
    }
    
    public function sertifikat(Siswa $siswa)
    {
        return view('template.sertifikat', compact('siswa'));
    }

    public function print(){
        $print = Siswa::all();
        return view('Print', compact('print'));
    }
}
