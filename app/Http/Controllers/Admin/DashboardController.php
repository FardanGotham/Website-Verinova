<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Achievement;
use App\Models\ClassInfo;
use App\Models\Gallery;
use App\Models\Organization;
use App\Models\Schedule;
use App\Models\Student;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [

            // Statistik
            'students' => Student::count(),
            'admins' => User::count(),
            'galleries' => Gallery::count(),
            'organizations' => Organization::count(),
            'schedules' => Schedule::count(),
            'achievements' => Achievement::count(),
            'classInfos' => ClassInfo::count(),

            // Data terbaru
            'latestStudents' => Student::latest()->take(5)->get(),
            'latestGalleries' => Gallery::latest()->take(6)->get(),

            // Data chart
            'chartData' => [
                Student::count(),
                Gallery::count(),
                Organization::count(),
                Schedule::count(),
            ],
        ]);
    }
}