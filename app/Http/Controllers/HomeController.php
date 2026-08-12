<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Gallery;
use App\Models\Organization;
use App\Models\Schedule;
use App\Models\Achievement;
use App\Models\ClassInfo;
use App\Models\DutySchedule;

class HomeController extends Controller
{
    public function index()
    {
        return view('home', [

    'studentCount' => Student::count(),

    'students' => Student::latest()->take(8)->get(),

    'photos' => Gallery::count(),

    'organizationsCount' => Organization::count(),

    'organizations' => Organization::all(),

    'galleries' => Gallery::latest()->take(6)->get(),

    'schedules' => Schedule::all()
        ->sortBy(function ($schedule) {

            $days = [
                'Senin' => 1,
                'Selasa' => 2,
                'Rabu' => 3,
                'Kamis' => 4,
                'Jumat' => 5,
                'Sabtu' => 6,
            ];

            return $days[$schedule->day] ?? 99;

        })
        ->groupBy('day'),

    // Tambahkan ini
    'achievements' => Achievement::latest()->take(6)->get(),

    'classInfos' => ClassInfo::latest()->take(6)->get(),

    'duties' => DutySchedule::with([
    'student1',
    'student2',
    'student3',
    'student4',
    'student5'
])->get(),
]);
    }
}