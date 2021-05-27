<?php

use Illuminate\Database\Seeder;

class fileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('files')->insert([
            'name' => 'Contrato-Ficticio',
            'file' => '5-Premium-Plan/ContratoFicticio.pdf',
            'user_id' => 5,
            'created_at' => now(),
        ]);
    }
}
