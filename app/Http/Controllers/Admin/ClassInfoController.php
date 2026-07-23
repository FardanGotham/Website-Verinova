<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClassInfo;
use Illuminate\Http\Request;

class ClassInfoController extends Controller
{
    public function index()
    {
        $infos = ClassInfo::latest()->get();

        return view('admin.class_infos.index', compact('infos'));
    }

    public function create()
    {
        return view('admin.class_infos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'teacher' => 'nullable',
            'deadline' => 'nullable|date',
            'description' => 'required',
            'attachment' => 'nullable|file|max:5120',
            'priority' => 'required',
            'status' => 'required',
        ]);

        $file = null;

        if ($request->hasFile('attachment')) {
            $file = $request->file('attachment')->store('attachments', 'public');
        }

        ClassInfo::create([
            'title' => $request->title,
            'category' => $request->category,
            'teacher' => $request->teacher,
            'deadline' => $request->deadline,
            'description' => $request->description,
            'attachment' => $file,
            'priority' => $request->priority,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('class-infos.index')
            ->with('success', 'Info kelas berhasil ditambahkan.');
    }

    public function edit(ClassInfo $classInfo)
    {
        return view('admin.class_infos.edit', compact('classInfo'));
    }

    public function update(Request $request, ClassInfo $classInfo)
    {
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'teacher' => 'nullable',
            'deadline' => 'nullable|date',
            'description' => 'required',
            'attachment' => 'nullable|file|max:5120',
            'priority' => 'required',
            'status' => 'required',
        ]);

        $file = $classInfo->attachment;

        if ($request->hasFile('attachment')) {
            $file = $request->file('attachment')->store('attachments', 'public');
        }

        $classInfo->update([
            'title' => $request->title,
            'category' => $request->category,
            'teacher' => $request->teacher,
            'deadline' => $request->deadline,
            'description' => $request->description,
            'attachment' => $file,
            'priority' => $request->priority,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('class-infos.index')
            ->with('success', 'Info kelas berhasil diperbarui.');
    }

    public function destroy(ClassInfo $classInfo)
    {
        $classInfo->delete();

        return redirect()
            ->route('class-infos.index')
            ->with('success', 'Info kelas berhasil dihapus.');
    }
}