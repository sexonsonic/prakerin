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
