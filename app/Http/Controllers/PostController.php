<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Template;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $data['posts'] = template::orderBy('id', 'desc')->paginate(5);
        $templates = template::latest()->paginate(5);

        // $template = template::all();
        return view('admin.template', compact('templates'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tambah-template');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'namatplt' => 'required'
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $postImage = date('ymdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $postImage);
            $input['image'] = "$postImage";
        }

        if (Template::where('status', 'default')->exists()) {
            $input['status'] = 'non-default';
        }
        template::create($input);
        return redirect()->route('template')->with('toast_success', 'Template berhasil ditambah');
    }

    public function search(Request $request)
    {
        $cari= $_GET['quer'];
        $templates = Template::where('namatplt', 'LIKE', '%'.$cari.'%')->get();

        return view('admin.searchT', compact('templates'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editT(string $id)
    {
        $template = template::find($id);
        return view('admin.edit-template', compact('template'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateT(Request $request, $id)
    {
        $ubah = Template::findorfail($id);
        $awal = $ubah->image;

        $data = [
            'status' => $request['status'],
            'namatplt' => $request['namatplt'],
            'image' => $awal

        ];

        $request->image->move(public_path() . '/images', $awal);
        $ubah->update($data);

        return redirect()->route('template')->with('toast_success', 'Template berhasil diubah');



        // $request->validate([
        //     'status' => 'required',
        //     'namatplt' => 'required',
        // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ]);

        // $input = $request->all();

        // if ($image = $request->file('image')) {
        //     $destinationPath = 'images/';
        //     $postImage = date('ymdHis') . "." . $image->getClientOriginalExtension();
        //     $image->move($destinationPath, $postImage);
        //     $input['image'] = "$postImage";
        // } else {
        //     unset($input['image']);
        // }

        // $template->update($input);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $id = Template::find($id);
        $id->delete();

        return back()->with('toast_success', 'Data Berhasil Dihapus!');
    }
}
