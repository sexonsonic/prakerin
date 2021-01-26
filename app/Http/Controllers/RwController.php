<?php

namespace App\Http\Controllers;
use App\Models\RW;
use App\Models\Kelurahan;
use App\Http\Controllers\DB;
use Illuminate\Http\Request;

class RwController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $rw = RW::with('kelurahan')->get();
        return view('rw.index', compact('rw'));
    }

    public function create()
    {
        $rw = RW::all();
        $kelurahan = Kelurahan::all();
        return view('rw.create', compact('rw','kelurahan'));
    }

    
    public function store(Request $request)
    {
        $rw = new RW;
        $rw->nama = $request->nama;
        $rw->id_kelurahan = $request->id_kelurahan;
        $rw->save();
        return redirect()->route('rw.index')
                ->with(['message'=>'Data RW berhasil dibuat !']);
    }

    
    public function show($id)
    {
        $rw = RW::findOrFail($id);
        $kelurahan = Kelurahan::all();
        return view('rw.show', compact('rw','kelurahan'));
    }

    
    public function edit($id)
    {
        $rw = RW::findOrFail($id);
        $kelurahan = Kelurahan::all();
        return view('rw.edit', compact('rw', 'kelurahan'));
    }

    
    public function update(Request $request, $id)
    {
        $rw = RW::findOrFail($id);
        $rw->nama = $request->nama;
        $rw->id_kelurahan = $request->id_kelurahan;
        $rw->save();
        return redirect()->route('rw.index')
                ->with(['message'=>'Data RW berhasil diubah !']);
    }

    
    public function destroy($id)
    {
        $rw = RW::findOrFail($id)->delete();
        return redirect()->route('rw.index')
                ->with(['message'=>'RW berhasil dihapus']);
    }
}
