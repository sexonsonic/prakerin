<?php

namespace App\Http\Controllers;
use App\Models\Kelurahan;
use App\Models\Kecamatan;
use App\Http\Controllers\DB;
use Illuminate\Http\Request;


class KelurahanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $kelurahan = Kelurahan::with('kecamatan')->get();
        return view('kelurahan.index', compact('kelurahan'));
    }

    
    public function create()
    {
        $kelurahan = Kelurahan::all();
        $kecamatan = Kecamatan::all();
        return view('kelurahan.create', compact('kelurahan','kecamatan'));
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'kode_kelurahan' => 'required|max:11|unique:kelurahans',
            'nama_kelurahan' => 'required|unique:kelurahans'
        ], [
            'kode_kelurahan.required' => 'Kode kelurahan tidak boleh kosong',
            'kode_kelurahan.max' => 'Kode maximal 11 karakter',
            'kode_kelurahan.unique' => 'Kode kelurahan sudah terdaftar',
            'nama_kelurahan.required' => 'Nama kelurahan tidak boleh kosong',
            'nama_kelurahan.unique' => 'Nama kelurahan sudah terdaftar'
        ]);

        $kelurahan = new Kelurahan;
        $kelurahan->kode_kelurahan = $request->kode_kelurahan;
        $kelurahan->nama_kelurahan = $request->nama_kelurahan;
        $kelurahan->id_kecamatan = $request->id_kecamatan;
        $kelurahan->save();
        return redirect()->route('kelurahan.index')
                ->with(['message'=>'Data Kelurahan berhasil dibuat !']);
    }

    
    public function show($id)
    {
        $kelurahan = Kelurahan::findOrFail($id);
        $kecamatan = Kecamatan::all();
        return view('kelurahan.show', compact('kelurahan','kecamatan'));
    }

    
    public function edit($id)
    {
        $kelurahan = Kelurahan::findOrFail($id);
        $kecamatan = Kecamatan::all();
        return view('kelurahan.edit', compact('kelurahan', 'kecamatan'));
    }

    
    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_kelurahan' => 'required|max:11',
            'nama_kelurahan' => 'required'
        ], [
            'kode_kelurahan.required' => 'Kode kelurahan tidak boleh kosong',
            'kode_kelurahan.max' => 'Kode maximal 11 karakter',
            'nama_kelurahan.required' => 'Nama kelurahan tidak boleh kosong'
        ]);

        $kelurahan = Kelurahan::findOrFail($id);
        $kelurahan->kode_kelurahan = $request->kode_kelurahan;
        $kelurahan->nama_kelurahan = $request->nama_kelurahan;
        $kelurahan->id_kecamatan = $request->id_kecamatan;
        $kelurahan->save();
        return redirect()->route('kelurahan.index')
                ->with(['message'=>'Data Kelurahan berhasil diubah !']);
    }

    
    public function destroy($id)
    {
        $kelurahan = Kelurahan::findOrFail($id)->delete();
        return redirect()->route('kelurahan.index')
                ->with(['message'=>'Kelurahan / Desa berhasil dihapus']);
    }
}
