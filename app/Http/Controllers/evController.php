<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class evController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $events = event::all();

        // return view('admin.dashboard', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeE(Request $request)
    {
        // Event::create([
        //     'tanggalEv' => $request->tanggalEv,
        //     'namaEv' => $request->namaEv,
        //     'statusEv' => $request->statusEv,
        // ]);

        // return redirect('/home')->with('toast_success', 'Event Berhasil Disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        return view('template.img');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
