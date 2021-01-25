<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Kecamatan;

class Kelurahan extends Model
{
    protected $fillable = ['kode_kelurahan','nama_kelurahan','id_kecamatan'];
    public $timetamps = true;

    public function kecamatann(){
        return $this->belongsTo('App\Kecamatan','id_kecamatan');
    }

    public function rw(){
        return $this->hasMany('App\RW','id_kelurahan');
    }
}
