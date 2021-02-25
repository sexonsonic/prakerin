<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Kecamatan;
use App\Models\Kota;
use App\Http\Controllers\DB;

class KecamatanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $kecamatan = Kecamatan::with('kota')->get();
        return view('kecamatan.index', compact('kecamatan'));
    }

    
    public function create()
    {
        $kecamatan = Kecamatan::all();
        $kota = Kota::all();
        return view('kecamatan.create', compact('kecamatan','kota'));
    }

  
    public function store(Request $request)
    {
        $request->validate([
            'nama_kecamatan' => 'required|unique:kecamatans'
        ], [
            'nama_kecamatan.required' => 'Nama kecamatan tidak boleh kosong',
            'nama_kecamatan.unique' => 'Nama kecamatan sudah terdaftar'
        ]);

        $kecamatan = new Kecamatan;
        $kecamatan->nama_kecamatan = $request->nama_kecamatan;
        $kecamatan->id_kota = $request->id_kota;
        $kecamatan->save();
        return redirect()->route('kecamatan.index')
                ->with(['message'=>'Data Kecamatan berhasil dibuat !']);
    }

    
    public function show($id)
    {
        $kecamatan = Kecamatan::findOrFail($id);
        $kota = Kota::all();
        return view('kecamatan.show', compact('kecamatan','kota'));
    }

    
    public function edit($id)
    {
        $kecamatan = Kecamatan::findOrFail($id);
        $kota = Kota::all();
        return view('kecamatan.edit', compact('kecamatan','kota'));
    }

    
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kecamatan' => 'required'
        ], [
            'nama_kecamatan.required' => 'Nama kecamatan tidak boleh kosong'
        ]);

        $kecamatan = Kecamatan::findOrFail($id);
        $kecamatan->nama_kecamatan = $request->nama_kecamatan;
        $kecamatan->id_kota = $request->id_kota;
        $kecamatan->save();
        return redirect()->route('kecamatan.index')
                ->with(['message'=>'Data kecamatan berhasil diubah !']);
    }

    
    public function destroy($id)
    {
        $kecamatan = Kecamatan::findOrFail($id)->delete();
        return redirect()->route('kecamatan.index')
                ->with(['message'=>'Kecamatan berhasil dihapus']);
    }
}
