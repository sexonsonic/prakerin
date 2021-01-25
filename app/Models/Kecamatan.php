<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Kota;

class Kecamatan extends Model
{
    protected $fillable = ['kode_kecamatan','nama_kecamatan','id_kota'];
    public $timetamps = true;

    public function kota(){
        return $this->belongsTo('App\Models\Kota','id_kota');
    }

    public function kelurahan(){
        return $this->hasMany('App\Models\Kelurahan','id_kecamatan');
    }
}
