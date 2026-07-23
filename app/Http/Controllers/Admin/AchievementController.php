<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Achievement;
use Illuminate\Http\Request;

class AchievementController extends Controller
{
    public function index()
    {
        $achievements = Achievement::latest()->get();

        return view('admin.achievements.index', compact('achievements'));
    }

    public function create()
    {
        return view('admin.achievements.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'level' => 'required',
            'year' => 'required',
            'description' => 'nullable',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $photo = null;

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo')->store('achievements', 'public');
        }

        Achievement::create([
            'title' => $request->title,
            'level' => $request->level,
            'year' => $request->year,
            'description' => $request->description,
            'photo' => $photo,
        ]);

        return redirect()->route('achievements.index')
            ->with('success', 'Prestasi berhasil ditambahkan.');
    }

    public function edit(Achievement $achievement)
    {
        return view('admin.achievements.edit', compact('achievement'));
    }

    public function update(Request $request, Achievement $achievement)
    {
        $request->validate([
            'title' => 'required',
            'level' => 'required',
            'year' => 'required',
            'description' => 'nullable',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $photo = $achievement->photo;

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo')->store('achievements', 'public');
        }

        $achievement->update([
            'title' => $request->title,
            'level' => $request->level,
            'year' => $request->year,
            'description' => $request->description,
            'photo' => $photo,
        ]);

        return redirect()->route('achievements.index')
            ->with('success', 'Prestasi berhasil diperbarui.');
    }

    public function destroy(Achievement $achievement)
    {
        $achievement->delete();

        return redirect()->route('achievements.index')
            ->with('success', 'Prestasi berhasil dihapus.');
    }
}