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

use Illuminate\Support\Carbon;


class ApiController extends Controller
{
    
    public function index()
    {

        $hariini = Carbon::now()->format('d-m-y'); 
    	$dt_skrg = DB::table('kasus2s')
                    ->select(DB::raw('SUM(jml_positif) as Positif'), 
                             DB::raw('SUM(jml_sembuh) as Sembuh'), 
                             DB::raw('SUM(jml_meninggal) as Meninggal'),
                             DB::raw('MAX(tanggal) as Tanggal'))
	    			->whereDay('tanggal', '=' , $hariini)
	    			->get();
        $dt = DB::table('kasus2s')
                    ->select(DB::raw('SUM(jml_positif) as Positif'), 
                             DB::raw('SUM(jml_sembuh) as Sembuh'), 
                             DB::raw('SUM(jml_meninggal) as Meninggal'))
    				->get();
    	$res = [
    		'success' => true,
    		'data' => [
                'hari_ini' => $dt_skrg, 
                'total' => $dt
            ],
    		'message' => 'berhasil'
    	];
    	return response()->json($res, 200);

    }

    // Per Provinsi
    public function provinsi()
    {
        $dt = DB::table('kasus2s')
                ->select(DB::raw('provinsis.nama_provinsi as Provinsi'), 
                        DB::raw('SUM(kasus2s.jml_positif) as "Jumlah Positif"'), 
                        DB::raw('SUM(kasus2s.jml_meninggal) as "Jumlah Meninggal"'),
                        DB::raw('SUM(kasus2s.jml_sembuh) as "Jumlah Sembuh"')) 
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

    public function showprov()
    {
        $dt = DB::table('kasus2s')
                ->select(DB::raw('provinsis.nama_provinsi as Provinsi'), 
                         DB::raw('SUM(kasus2s.jml_positif) as Positif'), 
                         DB::raw('SUM(kasus2s.jml_meninggal) as Meninggal'),
                         DB::raw('SUM(kasus2s.jml_sembuh) as Sembuh')) 
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

   // Per Kota
    public function kota()
    {
        $dt = DB::table('kasus2s')
                ->select(DB::raw('kotas.nama_kota as "Kota / Kabupaten"'), 
                        DB::raw('SUM(kasus2s.jml_positif) as "Jumlah Positif"'), 
                        DB::raw('SUM(kasus2s.jml_meninggal) as "Jumlah Meninggal"'),
                        DB::raw('SUM(kasus2s.jml_sembuh) as "Jumlah Sembuh"')) 
    			->join('r_w_s', 'r_w_s.id', '=', 'kasus2s.id_rw')
    			->join('kelurahans', 'kelurahans.id', '=', 'r_w_s.id_kelurahan')
    			->join('kecamatans', 'kecamatans.id', '=', 'kelurahans.id_kecamatan')
    			->join('kotas', 'kotas.id', '=', 'kecamatans.id_kota')
    			->groupBy('kotas.nama_kota')
    			->get();
    	$res = [
    		'success' => true,
    		'data' => $dt,
    		'message' => 'berhasil'
    	];
    	return response()->json($res, 200);
    }

    public function showkot($id)
    {
        $dt = DB::table('kasus2s')
                ->select(DB::raw('kotas.nama_kota as "Kota / Kabupaten"'), 
                         DB::raw('SUM(kasus2s.jml_positif) as Positif'), 
                         DB::raw('SUM(kasus2s.jml_meninggal) as Meninggal'),
                         DB::raw('SUM(kasus2s.jml_sembuh) as Sembuh')) 
    			->join('r_w_s', 'r_w_s.id', '=', 'kasus2s.id_rw')
    			->join('kelurahans', 'kelurahans.id', '=', 'r_w_s.id_kelurahan')
    			->join('kecamatans', 'kecamatans.id', '=', 'kelurahans.id_kecamatan')
    			->join('kotas', 'kotas.id', '=', 'kecamatans.id_kota')
    			->where('kotas.id', $id)
    			->groupBy('kotas.nama_kota')
    			->get();
    	$res = [
    		'success' => true,
    		'data' => $dt,
    		'message' => 'berhasil'
    	];
    	return response()->json($res, 200);
    }

    // Per Kecamatan
    public function kecamatan()
    {
        $dt = DB::table('kasus2s')
                ->select(DB::raw('kecamatans.nama_kecamatan as "Kecamatan"'), 
                        DB::raw('SUM(kasus2s.jml_positif) as "Jumlah Positif"'), 
                        DB::raw('SUM(kasus2s.jml_meninggal) as "Jumlah Meninggal"'),
                        DB::raw('SUM(kasus2s.jml_sembuh) as "Jumlah Sembuh"')) 
    			->join('r_w_s', 'r_w_s.id', '=', 'kasus2s.id_rw')
    			->join('kelurahans', 'kelurahans.id', '=', 'r_w_s.id_kelurahan')
    			->join('kecamatans', 'kecamatans.id', '=', 'kelurahans.id_kecamatan')
    			->groupBy('kecamatans.nama_kecamatan')
    			->get();
    	$res = [
    		'success' => true,
    		'data' => $dt,
    		'message' => 'berhasil'
    	];
    	return response()->json($res, 200);
    }

    public function showkec($id)
    {
        $dt = DB::table('kasus2s')
                ->select(DB::raw('kecamatans.nama_kecamatan as "Kecamatan"'), 
                         DB::raw('SUM(kasus2s.jml_positif) as Positif'), 
                         DB::raw('SUM(kasus2s.jml_meninggal) as Meninggal'),
                         DB::raw('SUM(kasus2s.jml_sembuh) as Sembuh')) 
    			->join('r_w_s', 'r_w_s.id', '=', 'kasus2s.id_rw')
    			->join('kelurahans', 'kelurahans.id', '=', 'r_w_s.id_kelurahan')
    			->join('kecamatans', 'kecamatans.id', '=', 'kelurahans.id_kecamatan')
    			->where('kecamatans.id', $id)
    			->groupBy('kecamatans.nama_kecamatan')
    			->get();
    	$res = [
    		'success' => true,
    		'data' => $dt,
    		'message' => 'berhasil'
    	];
    	return response()->json($res, 200);
    }

    // Per Kelurahan
    public function kelurahan()
    {
        $dt = DB::table('kasus2s')
                ->select(DB::raw('kelurahans.nama_kelurahan as "Kelurahan / Desa"'), 
                        DB::raw('SUM(kasus2s.jml_positif) as "Jumlah Positif"'), 
                        DB::raw('SUM(kasus2s.jml_meninggal) as "Jumlah Meninggal"'),
                        DB::raw('SUM(kasus2s.jml_sembuh) as "Jumlah Sembuh"')) 
    			->join('r_w_s', 'r_w_s.id', '=', 'kasus2s.id_rw')
    			->join('kelurahans', 'kelurahans.id', '=', 'r_w_s.id_kelurahan')
    			->groupBy('kelurahans.nama_kelurahan')
    			->get();
    	$res = [
    		'success' => true,
    		'data' => $dt,
    		'message' => 'berhasil'
    	];
    	return response()->json($res, 200);
    }

    public function showkel($id)
    {
        $dt = DB::table('kasus2s')
                ->select(DB::raw('kelurahans.nama_kelurahan as "Kelurahan / Desa"'), 
                         DB::raw('SUM(kasus2s.jml_positif) as Positif'), 
                         DB::raw('SUM(kasus2s.jml_meninggal) as Meninggal'),
                         DB::raw('SUM(kasus2s.jml_sembuh) as Sembuh')) 
    			->join('r_w_s', 'r_w_s.id', '=', 'kasus2s.id_rw')
    			->join('kelurahans', 'kelurahans.id', '=', 'r_w_s.id_kelurahan')
    			->where('kelurahans.id', $id)
    			->groupBy('kelurahans.nama_kelurahan')
    			->get();
    	$res = [
    		'success' => true,
    		'data' => $dt,
    		'message' => 'berhasil'
    	];
    	return response()->json($res, 200);
    }

    // Per RW
    // public function rw()
    // {
    //     $dt = DB::table('kasus2s')
    //             ->select(DB::raw('r_w_s.nama as "RW"'), 
    //                     DB::raw('SUM(kasus2s.jml_positif) as "Jumlah Positif"'), 
    //                     DB::raw('SUM(kasus2s.jml_meninggal) as "Jumlah Meninggal"'),
    //                     DB::raw('SUM(kasus2s.jml_sembuh) as "Jumlah Sembuh"')) 
    // 			->join('r_w_s', 'r_w_s.id', '=', 'kasus2s.id_rw')
    // 			->groupBy('r_w_s.id')
    // 			->get();
    // 	$res = [
    // 		'success' => true,
    // 		'data' => $dt,
    // 		'message' => 'berhasil'
    // 	];
    // 	return response()->json($res, 200);
    // }

    // public function showrw($id)
    // {
    //     $dt = DB::table('kasus2s')
    //             ->select(DB::raw('r_w_s.nama as "RW"'), 
    //                      DB::raw('SUM(kasus2s.jml_positif) as Positif'), 
    //                      DB::raw('SUM(kasus2s.jml_meninggal) as Meninggal'),
    //                      DB::raw('SUM(kasus2s.jml_sembuh) as Sembuh')) 
    // 			->join('r_w_s', 'r_w_s.id', '=', 'kasus2s.id_rw')
    // 			->where('r_w_s.id', $id)
    // 			->groupBy('r_w_s.id')
    // 			->get();
    // 	$res = [
    // 		'success' => true,
    // 		'data' => $dt,
    // 		'message' => 'berhasil'
    // 	];
    // 	return response()->json($res, 200);
    // }
    
    public function show($id)
    {
    
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
