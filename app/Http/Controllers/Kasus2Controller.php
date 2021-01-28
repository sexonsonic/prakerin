<?php

namespace App\Http\Controllers;
use App\Models\Kasus2;
use App\Models\RW;

use App\Http\Controllers\DB;
use Illuminate\Http\Request;

class Kasus2Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $kasus2 = Kasus2::with('rw')->get();
        return view('kasus2.index', compact('kasus2'));
    }

    
    public function create()
    {
        $kasus2 = Kasus2::all();
        $rw = RW::all();
        return view('kasus2.create', compact('kasus2','rw'));
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'jml_positif' => 'required',
            'jml_meninggal' => 'required',
            'jml_sembuh' => 'required'
        ], [
            'jml_positif.required' => 'Data tidak boleh kosong',
            'jml_meninggal.required' => 'Data tidak boleh kosong',
            'jml_sembuh.required' => 'Data tidak boleh kosong'
        ]);

        $kasus2 = new Kasus2;
        $kasus2->jml_positif = $request->jml_positif;
        $kasus2->jml_meninggal = $request->jml_meninggal;
        $kasus2->jml_sembuh = $request->jml_sembuh;
        $kasus2->tanggal = $request->tanggal;
        $kasus2->id_rw = $request->id_rw;
        $kasus2->save();
        return redirect()->route('kasus2.index')
                ->with(['message'=>'Data Kasus berhasil dibuat !']);
    }

    
    public function show($id)
    {
        $kasus2 = Kasus2::findOrFail($id);
        $rw = RW::all();
        return view('kasus2.show', compact('kasus2', 'rw'));
    }

    
    public function edit($id)
    {
        $kasus2 = Kasus2::findOrFail($id);
        $rw = RW::all();
        return view('kasus2.edit', compact('kasus2', 'rw'));
    }

    
    public function update(Request $request, $id)
    {
        $request->validate([
            'jml_positif' => 'required',
            'jml_meninggal' => 'required',
            'jml_sembuh' => 'required'
        ], [
            'jml_positif.required' => 'Data tidak boleh kosong',
            'jml_meninggal.required' => 'Data tidak boleh kosong',
            'jml_sembuh.required' => 'Data tidak boleh kosong'
        ]);

        $kasus2 = Kasus2::findOrFail($id);
        $kasus2->jml_positif = $request->jml_positif;
        $kasus2->jml_meninggal = $request->jml_meninggal;
        $kasus2->jml_sembuh = $request->jml_sembuh;
        $kasus2->tanggal = $request->tanggal;
        $kasus2->id_rw = $request->id_rw;
        $kasus2->save();
        return redirect()->route('kasus2.index')
                ->with(['message'=>'Data Kasus berhasil diubah !']);
    }

    
    public function destroy($id)
    {
        $kasus2 = Kasus2::find($id)->delete();
         //Alert::success('Selamat Datang !')->persistent('Confirm');
        return redirect()->route('kasus2.index')->with('success','User deleted successfully');
    }
}
