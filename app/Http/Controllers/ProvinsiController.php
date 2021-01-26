<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Provinsi;
use App\Http\Controllers\DB;

class ProvinsiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $provinsi = Provinsi::all();
        return view('provinsi.index', compact('provinsi'));
    }

    
    public function create()
    {
        return view('provinsi.create');
    }

    
    public function store(Request $request)
    {
        $provinsi = new Provinsi;
        $provinsi->kode_provinsi = $request->kode_provinsi;
        $provinsi->nama_provinsi = $request->nama_provinsi;
        $provinsi->save();
        return redirect()->route('provinsi.index');
    }

    
    public function show($id)
    {
        $provinsi = Provinsi::findOrFail($id);
        return view('provinsi.show', compact('provinsi'));
    }

    
    public function edit($id)
    {
        $provinsi = Provinsi::findOrFail($id);
        return view('provinsi.edit', compact('provinsi'));
    }

    
    public function update(Request $request, $id)
    {
        $provinsi = Provinsi::findOrFail($id);
        $provinsi->kode_provinsi = $request->kode_provinsi;
        $provinsi->nama_provinsi = $request->nama_provinsi;
        $provinsi->save();
        return redirect()->route('provinsi.index')
               ->with(['message'=>'Provinsi berhasil di edit !']);
    }

    
    public function destroy($id)
    {
        $provinsi = Provinsi::findOrFail($id)->delete();
        return redirect()->route('provinsi.index')
                ->with(['message'=>'Provinsi berhasil dihapus']);
    }
}
