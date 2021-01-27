<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Provinsi;
use App\Models\Kota;
use App\Http\Controllers\DB;

class KotaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
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
        $request->validate([
            'kode_kota' => 'required|max:7|unique:kotas',
            'nama_kota' => 'required|unique:kotas'
        ], [
            'kode_kota.required' => 'Kode kota tidak boleh kosong',
            'kode_kota.max' => 'Kode maximal 7 karakter',
            'kode_kota.unique' => 'Kode kota sudah terdaftar',
            'nama_kota.required' => 'Nama kota tidak boleh kosong',
            'nama_kota.unique' => 'Nama kota sudah terdaftar'
        ]);

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
        $request->validate([
            'kode_kota' => 'required|max:7',
            'nama_kota' => 'required|unique:kotas'
        ], [
            'kode_kota.required' => 'Kode kota tidak boleh kosong',
            'kode_kota.max' => 'Kode maximal 7 karakter',
            'nama_kota.required' => 'Nama kota tidak boleh kosong',
            'nama_kota.unique' => 'Nama kota sudah terdaftar'
        ]);

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
