<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class InternationalSchool extends Model
{
    use SoftDeletes;

    protected $table = 'international_schools';
    protected $fillable = [
        'jenjang_pendidikan',
        'negara',
        'satuan_pendidikan',
        'npsn',
        'nama_pic',
        'jabatan_pic',
        'no_pic',
        'document'
    ];
}
