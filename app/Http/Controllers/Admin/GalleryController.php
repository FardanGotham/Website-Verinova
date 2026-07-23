<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::latest()->get();

        return view('admin.galleries.index', compact('galleries'));
    }

    public function create()
    {
        return view('admin.galleries.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'category'=>'required',
            'image'=>'required|image|mimes:jpg,jpeg,png,heic|max:2048',
            'description'=>'nullable'
        ]);

        $image = $request->file('image')->store('gallery','public');

        Gallery::create([
            'title'=>$request->title,
            'category'=>$request->category,
            'description'=>$request->description,
            'image'=>$image
        ]);

        return redirect()->route('galleries.index')
            ->with('success','Foto berhasil diupload.');
    }
    public function edit(Gallery $gallery)
{
    return view('admin.galleries.edit', compact('gallery'));
}

public function update(Request $request, Gallery $gallery)
{
    $request->validate([
        'title' => 'required',
        'category' => 'required',
        'description' => 'nullable',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,heic|max:2048',
    ]);

    if ($request->hasFile('image')) {

        $image = $request->file('image')->store('gallery', 'public');

        $gallery->image = $image;
    }

    $gallery->title = $request->title;
    $gallery->category = $request->category;
    $gallery->description = $request->description;

    $gallery->save();

    return redirect()->route('galleries.index')
        ->with('success', 'Foto berhasil diperbarui.');
}

public function destroy(Gallery $gallery)
{
    $gallery->delete();

    return redirect()->route('galleries.index')
        ->with('success', 'Foto berhasil dihapus.');
}
}