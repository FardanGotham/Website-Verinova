<?php

namespace App\Http\Controllers;

use App\Models\Schedule;

class ScheduleController extends Controller
{
    public function index()
    {
        $days = [
            'Senin',
            'Selasa',
            'Rabu',
            'Kamis',
            'Jumat'
        ];

        $schedules = Schedule::orderBy('day')
        ->orderBy('start_time')
        ->get()
        ->groupBy('day');

        return view('schedules.index', compact('days','schedules'));
    }
}