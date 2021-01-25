<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Provinsi;
use App\Models\Kota;
use App\Http\Controllers\DB;

class KotaController extends Controller
{
    
    public function index()
    {
        $kota = Kota::with('provinsi')->get();
        return view('kota.index', compact('kota'));
    }

    
    public function create()
    {
        $provinsi = Provinsi::all();
        $kota = Kota::all();
        return view('kota.create', compact('kota','provinsi'));
    }

    
    public function store(Request $request)
    {
        $kota = new Kota;
        $kota->kode_kota = $request->kode_kota;
        $kota->nama_kota = $request->nama_kota;
        $kota->id_provinsi = $request->id_provinsi;
        $kota->save();
        return redirect()->route('kota.index')
                ->with(['message'=>'Data Kota / Kabupaten berhasil dibuat !']);
    }

    
    public function show($id)
    {
        $kota = Kota::findOrFail($id);
        $provinsi = Provinsi::findOrFail($id);
        return view('kota.show', compact('kota','provinsi'));
    }

    
    public function edit($id)
    {
        $kota = Kota::findOrFail($id);
        $provinsi = Provinsi::all();
        return view('kota.edit', compact('kota','provinsi'));
    }

   
    public function update(Request $request, $id)
    {
        $kota = Kota::findOrFail($id);
        $kota->kode_kota = $request->kode_kota;
        $kota->nama_kota = $request->nama_kota;
        $kota->id_provinsi = $request->id_provinsi;
        $kota->save();
        return redirect()->route('kota.index')
                ->with(['message'=>'Data Kota / Kabupaten berhasil diubah !']);
    }

    
    public function destroy($id)
    {
        $kota = Kota::findOrFail($id)->delete();
        return redirect()->route('kota.index')
                ->with(['message'=>'Kota / Kabupaten berhasil dihapus']);
    }
}
