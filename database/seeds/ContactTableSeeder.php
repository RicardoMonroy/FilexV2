<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contacts')->insert([
            'paragraph' => 'Puedes ponerte en contacto con nosotros y nuestro equipo de expertos legales y tecnológicos resolverán tus dudas y/o atenderán tus comentarios.',
            'address' => '',
            'addressPhone' => '',
            'addressMovil' => '',
            'emailSupport' => 'support@filex.com',
            'emailSales' => 'sales@filex.com',
            'emailContact' => 'contact@filex.com'
        ]);
    }
}
