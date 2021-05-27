<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DocumentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('documents')->insert([
            'name' => 'Contratos',
            'about_id' => 1,
        ]);

        DB::table('documents')->insert([
            'name' => 'Cartas',
            'about_id' => 1,
        ]);

        DB::table('documents')->insert([
            'name' => 'Oficios',
            'about_id' => 1,
        ]);
    }
}
