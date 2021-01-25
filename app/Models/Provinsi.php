<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    protected $fillable = ['kode_provinsi','nama_provinsi'];
    public $timetamps = true;

    public function kota(){
        return $this->hasMany('Kota::class');
    }
}
