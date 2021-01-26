<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kecamatan;

class Kelurahan extends Model
{
    protected $fillable = ['kode_kelurahan','nama_kelurahan','id_kecamatan'];
    public $timetamps = true;

    public function kecamatan(){
        return $this->belongsTo('App\Models\Kecamatan','id_kecamatan');
    }

    public function rw(){
        return $this->hasMany('App\Models\RW','id_kelurahan');
    }
}
