<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Colleges extends Model
{
    use SoftDeletes;
    
    protected $table = 'colleges';
    protected $fillable = [
        'jenjang_pendidikan',
        'province_id',
        'regency_id',
        'perguruan_tinggi',
        'nama_narahubung',
        'jabatan_narahubung',
        'no_narahubung',
        'document'
    ];
}
