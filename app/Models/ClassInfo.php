<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassInfo extends Model
{
    protected $fillable = [

        'title',

        'category',

        'teacher',

        'deadline',

        'description',

        'attachment',

        'priority',

        'status',

    ];
}