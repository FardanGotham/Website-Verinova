<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassProfile extends Model
{
    protected $fillable = [
        'class_name',
        'slogan',
        'logo',
        'history',
        'vision',
        'mission',
        'motto',
        'logo_philosophy',
    ];
}