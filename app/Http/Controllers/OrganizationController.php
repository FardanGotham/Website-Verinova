<?php

namespace App\Http\Controllers;

use App\Models\Organization;

class OrganizationController extends Controller
{
    public function index()
    {
        $members = Organization::orderBy('order')->get();

        return view('organization.index', compact('members'));
    }
}