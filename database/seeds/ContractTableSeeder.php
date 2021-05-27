<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContractTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contracts')->insert([
            'name' => 'Contrato Plataforma',
            'message' => 'El contrato de contratación de servicios de la plataforma Filex',
            'file_id' => 1,
            'user_id' => 5,
            'user_name' => 'Premium Plan',
            'created_at' => now(),
        ]);

        DB::table('contract_user')->insert([
            'user_id' => 5,
            'contract_id' => 1,
            'email' => 'premium@filex.com',
            'created_at' => now(),
        ]);

        DB::table('contract_user')->insert([
            'user_id' => 1,
            'contract_id' => 1,
            'email' => 'rmonroy.rodriguez@gmail.com',
            'created_at' => now(),
        ]);
    }
}
