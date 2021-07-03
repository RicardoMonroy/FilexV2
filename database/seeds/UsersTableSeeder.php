<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Ricardo Monroy',
            'email' => 'rmonroy.rodriguez@gmail.com',
            'password' => Hash::make('12345678'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'name' => 'Erick Estrada Ojo de Agua',
            'email' => 'corporativo@tooring.com.mx',
            'password' => Hash::make('Tooring@2021'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'name' => 'Administrator',
            'email' => 'admin@filex.com.mx',
            'password' => Hash::make('Filex@21'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'name' => 'Basic Plan',
            'email' => 'basic@filex.com.mx',
            'password' => Hash::make('Filex@21'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'name' => 'Premium Plan',
            'email' => 'premium@filex.com.mx',
            'password' => Hash::make('Filex@21'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
