<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $fillable = [
        'krs_detail_id',
        'nilai_angka',
        'nilai_huruf',
    ];

    public function krsDetail()
    {
        return $this->belongsTo(KrsDetail::class);
    }
}
