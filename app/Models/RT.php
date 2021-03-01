<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\RW;

class RT extends Model
{
    protected $fillable = ['nama','id_rw'];
    public $timetamps = true;

    public function rw(){
        return $this->belongsTo('App\Models\RW','id_rw');
    }
    }
