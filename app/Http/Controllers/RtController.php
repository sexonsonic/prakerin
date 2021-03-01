<?php

namespace App\Http\Controllers;
use App\Models\RT;
use App\Models\RW;
use App\Http\Controllers\DB;

use Illuminate\Http\Request;

class RtController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $rt = RT::with('rt')->get();
        return view('rt.index', compact('rt'));
    }

    
    public function create()
    {
        $rt = RT::all();
        $rw = RW::all();
        return view('rt.create', compact('rt','rw'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:11'
        ], [
            'nama.required' => 'Nama RW tidak boleh kosong'
        ]);

        $rt = new RT;
        $rt->nama = $request->nama;
        $rt->id_rw = $request->id_rw;
        $rt->save();
        return redirect()->route('rt.index')
                ->with(['message'=>'Data RT berhasil dibuat !']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rt = RT::findOrFail($id);
        $rw = RW::all();
        return view('rt.show', compact('rt','rw'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rt = RT::findOrFail($id);
        $rw = RW::all();
        return view('rt.edit', compact('rt', 'rw'));
    }

    
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|max:11'
        ], [
            'nama.required' => 'Nama RW tidak boleh kosong'
        ]);

        $rt = RT::findOrFail($id);
        $rt->nama = $request->nama;
        $rt->id_rw = $request->id_rw;
        $rt->save();
        return redirect()->route('rt.index')
                ->with(['message'=>'Data RW berhasil diubah !']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
