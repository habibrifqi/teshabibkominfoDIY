<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CoursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('courses')->insert([
            'course' => 'C++',
            'mentor' => 'Ari',
            'title' => 'Dr.',
        ]);

        DB::table('courses')->insert([
            'course' => 'C#',
            'mentor' => 'Ari',
            'title' => 'Dr.',
        ]);
        DB::table('courses')->insert([
            'course' => 'C#',
            'mentor' => 'Ari',
            'title' => 'Dr.',
        ]);
        DB::table('courses')->insert([
            'course' => 'CSS',
            'mentor' => 'Cania',
            'title' => 'S.Kom',
        ]);
        DB::table('courses')->insert([
            'course' => 'HTML',
            'mentor' => 'Cania',
            'title' => 'S.Kom',
        ]);
        DB::table('courses')->insert([
            'course' => 'Javascript',
            'mentor' => 'Cania',
            'title' => 'S.Kom',
        ]);
        DB::table('courses')->insert([
            'course' => 'Python',
            'mentor' => 'Barry',
            'title' => 'S.T',
        ]);
        DB::table('courses')->insert([
            'course' => 'micropython',
            'mentor' => 'Barry',
            'title' => 'S.T',
        ]);
        DB::table('courses')->insert([
            'course' => 'Java',
            'mentor' => 'Darren',
            'title' => 'M.T',
        ]);
        DB::table('courses')->insert([
            'course' => 'Ruby',
            'mentor' => 'Darren',
            'title' => 'M.T',
        ]);
    }
}
