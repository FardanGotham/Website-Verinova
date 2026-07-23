<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(Request $request)
{
    $search = $request->search;

    $students = Student::when($search, function ($query) use ($search) {
            $query->where('nama', 'like', "%{$search}%")
                  ->orWhere('kelas', 'like', "%{$search}%")
                  ->orWhere('absen', 'like', "%{$search}%");
        })
        ->orderBy('absen')
        ->paginate(12)
        ->withQueryString();

    return view('students.index', compact('students'));
}
    public function adminIndex()
{
    $students = Student::latest()->get();

    return view('students.index', compact('students'));
}
    public function create()
{
    return view('students.create');
}
public function store(Request $request)
{
    $request->validate([
        'nama' => 'required',
        'absen' => 'required',
        'kelas' => 'required',
        'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $photo = null;

    if ($request->hasFile('photo')) {
        $photo = $request->file('photo')->store('students', 'public');
    }

    Student::create([
        'nama' => $request->nama,
        'absen' => $request->absen,
        'kelas' => $request->kelas,

        'photo' => $photo,

        'gender' => $request->gender,
        'email' => $request->email,
        'phone' => $request->phone,
        'address' => $request->address,

        'hobi' => $request->hobi,
        'cita_cita' => $request->cita_cita,
        'quote' => $request->quote,
    ]);

    return redirect()->route('students.index')
        ->with('success', 'Data siswa berhasil ditambahkan.');
}
public function edit(Student $student)
{
    return view('students.edit', compact('student'));
}
public function update(Request $request, Student $student)
{
    $photo = $student->photo;

    if ($request->hasFile('photo')) {
        $photo = $request->file('photo')->store('students', 'public');
    }

    $student->update([

        'nama' => $request->nama,
        'absen' => $request->absen,
        'kelas' => $request->kelas,

        'photo' => $photo,

        'gender' => $request->gender,
        'email' => $request->email,
        'phone' => $request->phone,
        'address' => $request->address,

        'hobi' => $request->hobi,
        'cita_cita' => $request->cita_cita,
        'quote' => $request->quote,

    ]);

    return redirect()->route('students.index')
        ->with('success', 'Data siswa berhasil diperbarui.');
}
public function destroy(Student $student)
{
    $student->delete();

    return redirect()
        ->route('students.index')
        ->with('success', 'Data siswa berhasil dihapus.');
}

public function show(Student $student)
{
    return view('students.show', compact('student'));
}
}