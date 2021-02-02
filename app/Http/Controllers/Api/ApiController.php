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


class ApiController extends Controller
{
    
    public function index()
    {
        $positif = DB::table('r_w_s')
                   ->select('kasus2s.jml_positif', 'kasus2s.jml_meninggal', 'kasus2s.jml_sembuh')
                   ->join('kasus2s','r_w_s.id','=','kasus2s.id_rw')
                   ->sum('kasus2s.jml_positif');
        $sembuh  = DB::table('r_w_s')
                   ->select('kasus2s.jml_positif', 'kasus2s.jml_meninggal', 'kasus2s.jml_sembuh')
                   ->join('kasus2s','r_w_s.id','=','kasus2s.id_rw')
                   ->sum('kasus2s.jml_sembuh');
        $meninggal = DB::table('r_w_s')
                   ->select('kasus2s.jml_positif', 'kasus2s.jml_meninggal', 'kasus2s.jml_sembuh')
                   ->join('kasus2s','r_w_s.id','=','kasus2s.id_rw')
                   ->sum('kasus2s.jml_meninggal');

        $res = [
            'success'           => true,
            'data'              => 'Data Kasus Indonesia',
            'Jumlah Positif'    => $positif,
            'Jumlah Sembuh'     => $sembuh,
            'Jumlah Meninggal'  => $meninggal,
            'message'           => 'Data Kasus Ditampilkan'
        ];

        return response()->json($res, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
