<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Halaman daftar siswa (Admin)
     */
    public function index()
    {
        $students = Student::latest()->get();

        return view('admin.students.index', compact('students'));
    }

    /**
     * Form tambah siswa
     */
    public function create()
    {
        return view('admin.students.create');
    }

    /**
     * Simpan data siswa
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama'   => 'required',
            'absen'  => 'required',
            'kelas'  => 'required',
            'photo'  => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $photo = null;

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo')->store('students', 'public');
        }

        Student::create([
            'nama'       => $request->nama,
            'absen'      => $request->absen,
            'kelas'      => $request->kelas,
            'photo'      => $photo,
            'gender'     => $request->gender,
            'email'      => $request->email,
            'phone'      => $request->phone,
            'address'    => $request->address,
            'hobi'       => $request->hobi,
            'cita_cita'  => $request->cita_cita,
            'quote'      => $request->quote,
            'jabatan' => $request->jabatan,
            'instagram'=>$request->instagram,
            'github'=>$request->github,
            'linkedin'=>$request->linkedin,
            'tiktok'=>$request->tiktok,
            'website'=>$request->website,
        ]);

        return redirect()
            ->route('admin.students.index')
            ->with('success', 'Data siswa berhasil ditambahkan.');
    }

    /**
     * Detail siswa (opsional)
     */
    public function show(Student $student)
    {
        return view('admin.students.show', compact('student'));
    }

    /**
     * Form edit siswa
     */
    public function edit(Student $student)
    {
        return view('admin.students.edit', compact('student'));
    }

    /**
     * Update data siswa
     */
    public function update(Request $request, Student $student)
    {
        $photo = $student->photo;

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo')->store('students', 'public');
        }

        $student->update([
            'nama'       => $request->nama,
            'absen'      => $request->absen,
            'kelas'      => $request->kelas,
            'photo'      => $photo,
            'gender'     => $request->gender,
            'email'      => $request->email,
            'phone'      => $request->phone,
            'address'    => $request->address,
            'hobi'       => $request->hobi,
            'cita_cita'  => $request->cita_cita,
            'quote'      => $request->quote,
            'jabatan' => $request->jabatan,
            'instagram'=>$request->instagram,
            'github'=>$request->github,
            'linkedin'=>$request->linkedin,
            'tiktok'=>$request->tiktok,
            'website'=>$request->website,
        ]);

        return redirect()
            ->route('admin.students.index')
            ->with('success', 'Data siswa berhasil diperbarui.');
    }

    /**
     * Hapus siswa
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()
            ->route('admin.students.index')
            ->with('success', 'Data siswa berhasil dihapus.');
    }
    
}