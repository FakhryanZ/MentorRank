<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topsis extends Model
{
    protected $table = 'skor_awal';

    protected $fillable = ['id','alternatif_id', 'kriteria_id', 'nilai'];
}
