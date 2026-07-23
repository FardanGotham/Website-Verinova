<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = Schedule::orderBy('day')->orderBy('start_time')->get();

        return view('admin.schedules.index', compact('schedules'));
    }

    public function create()
    {
        return view('admin.schedules.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'day' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'subject' => 'required',
            'teacher' => 'required',
        ]);

        Schedule::create($request->all());

        return redirect()->route('schedules.index')
            ->with('success', 'Jadwal berhasil ditambahkan.');
    }

    public function edit(Schedule $schedule)
    {
        return view('admin.schedules.edit', compact('schedule'));
    }

    public function update(Request $request, Schedule $schedule)
    {
        $request->validate([
            'day' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'subject' => 'required',
            'teacher' => 'required',
        ]);

        $schedule->update($request->all());

        return redirect()->route('schedules.index')
            ->with('success', 'Jadwal berhasil diperbarui.');
    }

    public function destroy(Schedule $schedule)
    {
        $schedule->delete();

        return redirect()->route('schedules.index')
            ->with('success', 'Jadwal berhasil dihapus.');
    }
}