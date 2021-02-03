<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Provinsi;
use App\Models\Kota;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\RW;
use App\Models\Kasus2;
use carbon\carbon;


class ApiController extends Controller
{
    
    public function index()
    {
        $dt = DB::table('kasus2s')
                ->select(DB::raw('provinsis.nama_provinsi as provinsi'), 
                        DB::raw('SUM(kasus2s.jml_positif) as positif'), 
                        DB::raw('SUM(kasus2s.jml_meninggal) as meninggal'),
                        DB::raw('SUM(kasus2s.jml_sembuh) as sembuh')) 
    			->join('r_w_s', 'r_w_s.id', '=', 'kasus2s.id_rw')
    			->join('kelurahans', 'kelurahans.id', '=', 'r_w_s.id_kelurahan')
    			->join('kecamatans', 'kecamatans.id', '=', 'kelurahans.id_kecamatan')
    			->join('kotas', 'kotas.id', '=', 'kecamatans.id_kota')
    			->join('provinsis', 'provinsis.id', '=', 'kotas.id_provinsi')
    			->groupBy('provinsis.nama_provinsi')
    			->get();
    	$res = [
    		'success' => true,
    		'data' => $dt,
    		'message' => 'berhasil'
    	];
    	return response()->json($res, 200);
    }

    
    public function create()
    {
        
    }

   
    public function store(Request $request)
    {
        //
    }

    
    public function show($id)
    {
        $dt = DB::table('kasus2s')
                ->select(DB::raw('provinsis.nama_provinsi as provinsi'), 
                         DB::raw('SUM(kasus2s.jml_positif) as positif'), 
                         DB::raw('SUM(kasus2s.jml_meninggal) as meninggal'),
                         DB::raw('SUM(kasus2s.jml_sembuh) as sembuh')) 
    			->join('r_w_s', 'r_w_s.id', '=', 'kasus2s.id_rw')
    			->join('kelurahans', 'kelurahans.id', '=', 'r_w_s.id_kelurahan')
    			->join('kecamatans', 'kecamatans.id', '=', 'kelurahans.id_kecamatan')
    			->join('kotas', 'kotas.id', '=', 'kecamatans.id_kota')
    			->join('provinsis', 'provinsis.id', '=', 'kotas.id_provinsi')
    			->where('provinsis.id', $id)
    			->groupBy('provinsis.nama_provinsi')
    			->get();
    	$res = [
    		'success' => true,
    		'data' => $dt,
    		'message' => 'berhasil'
    	];
    	return response()->json($res, 200);
    }

   
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        //
    }
}
