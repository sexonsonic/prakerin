<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\RW;

class Kasus2 extends Model
{
    protected $fillable = ['jml_positif','jml_meninggal','jml_sembuh','tanggal','id_rw'];
    public $timetamps = true;

    public function rw(){
        return $this->belongsTo('App\Models\RW', 'id_rw');
    }
}
