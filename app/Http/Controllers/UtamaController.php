<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Models\RW;
use carbon\carbon;

class UtamaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Count Up
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
        $global = file_get_contents('https://api.kawalcorona.com/positif');
        $posglobal = json_decode($global, TRUE);

        $tanggal = Carbon::now()->isoFormat('dddd, D MMMM Y hh:mm:ss');
        
            return view('utama',compact('positif','sembuh','meninggal','tanggal','posglobal'));
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
