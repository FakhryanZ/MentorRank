<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataNilai extends Model
{
    //
    protected $table = 'skor_awal';

    protected $fillable = ['alternatif_id', 'kriteria_id', 'nilai'];

    public $timestamps = true;
}
