<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [

    'nama',
    'absen',
    'kelas',
    'photo',

    'gender',
    'email',
    'phone',
    'address',

    'hobi',
    'cita_cita',
    'quote',
    'jabatan',

    'instagram',
    'github',
    'linkedin',
    'tiktok',
    'website',

];
}