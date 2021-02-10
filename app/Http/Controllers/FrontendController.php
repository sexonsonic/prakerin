<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use DB;
use App\Http\Models\Provinsi;
use App\Http\Models\Kota;
use App\Http\Models\Kecamatan;
use App\Http\Models\Kelurahan;
use App\Http\Models\RW;
use App\Http\Models\Kasus2;
use carbon\carbon;

class FrontendController extends Controller
{

    

    public function index()
    {
        $positif = DB::table('r_w_s')
            ->select('kasus2s.jml_positif',
            'kasus2s.jml_sembuh', 'kasus2s.jml_meninggal')
            ->join('kasus2s','r_w_s.id','=','kasus2s.id_rw')
            ->sum('kasus2s.jml_positif'); 
        $sembuh = DB::table('r_w_s')
            ->select('kasus2s.jml_positif',
            'kasus2s.jml_sembuh','kasus2s.jml_meninggal')
            ->join('kasus2s','r_w_s.id','=','kasus2s.id_rw')
            ->sum('kasus2s.jml_sembuh');
        $meninggal = DB::table('r_w_s')
            ->select('kasus2s.jml_positif',
            'kasus2s.jml_sembuh','kasus2s.jml_meninggal')
            ->join('kasus2s','r_w_s.id','=','kasus2s.id_rw')
            ->sum('kasus2s.jml_meninggal');
        
            
        return view('frontend.welcome',compact('positif','sembuh','meninggal'));
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
