<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Organization;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    public function index()
    {
        $organizations = Organization::orderBy('order')->get();

        return view('admin.organizations.index', compact('organizations'));
    }

    public function create()
    {
        return view('admin.organizations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'position'=>'required',
            'description'=>'nullable',
            'order'=>'required|integer'
        ]);

        Organization::create($request->all());

        return redirect()->route('organizations.index')
            ->with('success','Data berhasil ditambahkan.');
    }
    public function edit(Organization $organization)
{
    return view('admin.organizations.edit', compact('organization'));
}

public function update(Request $request, Organization $organization)
{
    $request->validate([
        'name' => 'required',
        'position' => 'required',
        'description' => 'nullable',
        'order' => 'required|integer',
    ]);

    $organization->update($request->all());

    return redirect()->route('organizations.index')
        ->with('success', 'Data berhasil diperbarui.');
}

    public function destroy(Organization $organization)
    {
        $organization->delete();

        return redirect()->route('organizations.index')
            ->with('success', 'Data berhasil dihapus.');
    }
}