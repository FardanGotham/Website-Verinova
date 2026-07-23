<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DutySchedule extends Model
{
    protected $fillable = [
        'day',
        'student_1',
        'student_2',
        'student_3',
        'student_4',
        'student_5',
    ];

    public function student1()
    {
        return $this->belongsTo(Student::class, 'student_1');
    }

    public function student2()
    {
        return $this->belongsTo(Student::class, 'student_2');
    }

    public function student3()
    {
        return $this->belongsTo(Student::class, 'student_3');
    }

    public function student4()
    {
        return $this->belongsTo(Student::class, 'student_4');
    }

    public function student5()
    {
        return $this->belongsTo(Student::class, 'student_5');
    }
}