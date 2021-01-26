<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Kelurahan;

class RW extends Model
{
    protected $fillable = ['nama','id_kelurahan'];
    public $timetamps = true;

    public function kelurahan(){
        return $this->belongsTo('App\Models\kelurahan','id_kelurahan');
    }

    public function kasus2(){
        return $this->hasMany('App\Models\Kasus2','id_rw');
    }
}
