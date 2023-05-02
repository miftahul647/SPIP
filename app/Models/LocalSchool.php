<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class LocalSchool extends Model
{
    use SoftDeletes;

    protected $table = 'local_schools';
    protected $fillable = [
        'jenjang_pendidikan',
        'province_id',
        'regency_id',
        'satuan_pendidikan',
        'npsn',
        'nama_pic',
        'jabatan_pic',
        'no_pic',
        'document'
    ];
}
