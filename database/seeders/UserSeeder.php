<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'username' => 'Andi',
            'email' => 'andi@andi.com',
            'password' => Hash::make('12345'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('users')->insert([
            'username' => 'Budi',
            'email' => 'budi@budi.com',
            'password' =>  Hash::make('67890'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('users')->insert([
            'username' => 'Caca',
            'email' => 'caca@caca.com',
            'password' => Hash::make('abced'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('users')->insert([
            'username' => 'Deni',
            'email' => 'deni@deni.com',
            'password' => Hash::make('fghij'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('users')->insert([
            'username' => 'Euis',
            'email' => 'euis@euis.com',
            'password' => Hash::make('klmno'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('users')->insert([
            'username' => 'fafa',
            'email' => 'Fafa@fafa.com',
            'password' => Hash::make('pqrst'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
