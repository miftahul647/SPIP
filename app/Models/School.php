<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    // use HasFactory;

    protected $fillable = [
        'id',
        'regency_id',
        'nama_sekolah'
    ];

}
