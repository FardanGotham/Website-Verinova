<?php

namespace App\Http\Controllers;

use App\Models\ClassProfile;

class ProfileController extends Controller
{
    public function index()
    {
        $profile = ClassProfile::first();

        return view('profile.index', compact('profile'));
    }
}