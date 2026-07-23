<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DutySchedule;
use App\Models\Student;
use Illuminate\Http\Request;

class DutyScheduleController extends Controller
{
    public function index()
    {
        $duties = DutySchedule::orderBy('day')->get();

        return view('admin.duty_schedules.index', compact('duties'));
    }

    public function create()
{
    $students = Student::orderBy('nama')->get();

    return view('admin.duty_schedules.create', compact('students'));
}

    public function store(Request $request)
{
    $request->validate([
        'day' => 'required',
        'student_1' => 'required',
        'student_2' => 'required',
        'student_3' => 'required',
        'student_4' => 'required',
        'student_5' => 'required',
    ]);

    DutySchedule::create($request->all());

    return redirect()
        ->route('duty-schedules.index')
        ->with('success', 'Jadwal piket berhasil ditambahkan.');
}

    public function edit(DutySchedule $duty_schedule)
{
    $students = Student::orderBy('nama')->get();

    return view('admin.duty_schedules.edit', compact('duty_schedule', 'students'));
}

    public function update(Request $request, DutySchedule $duty_schedule)
{
    $request->validate([
        'day' => 'required',
        'student_1' => 'required',
        'student_2' => 'required',
        'student_3' => 'required',
        'student_4' => 'required',
        'student_5' => 'required',
    ]);

    $duty_schedule->update($request->all());

    return redirect()
        ->route('duty-schedules.index')
        ->with('success', 'Jadwal piket berhasil diperbarui.');
}

    public function destroy(DutySchedule $duty_schedule)
    {
        $duty_schedule->delete();

        return redirect()
            ->route('duty-schedules.index')
            ->with('success', 'Jadwal piket berhasil dihapus.');
    }
}