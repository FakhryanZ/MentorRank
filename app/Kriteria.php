<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    protected $table = 'kriteria';

    protected $fillable = ['id','nama_kriteria','bobot', 'status'];

    public function detail_kriteria(){
        return $this->hasMany('App\Detail_Kriteria');
    }

    public function alternatif(){
        return $this->belongsToMany('App\Alternatif');
    }
}

