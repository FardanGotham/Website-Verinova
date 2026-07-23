<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        Student::create([
            'nama' => 'Fardan Fadillah',
            'absen' => 1,
            'kelas' => 'XI PPLG 2',
            'hobi' => 'Coding',
            'cita_cita' => 'Software Engineer',
        ]);

        Student::create([
            'nama' => 'Hexa',
            'absen' => 2,
            'kelas' => 'XI PPLG 2',
            'hobi' => 'Futsal',
            'cita_cita' => 'Atlet',
        ]);

        Student::create([
            'nama' => 'Faiz',
            'absen' => 3,
            'kelas' => 'XI PPLG 2',
            'hobi' => 'Coding',
            'cita_cita' => 'Programmer',
        ]);
    }
}