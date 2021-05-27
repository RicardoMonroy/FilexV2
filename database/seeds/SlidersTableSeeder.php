<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SlidersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sliders')->insert([
            'title' => '¡Olvídate de los papeles!',
            'subtitle' => 'Una plataforma para firmar tus documentos',
            'paragraph' => 'con firma electrónica',
            'banner' => 'Sliders/Banner1.png',
            'margin' => 'center'
        ]);

        DB::table('sliders')->insert([
            'title' => 'FILEX',
            'subtitle' => 'Una plataforma para firmar tus documentos',
            'paragraph' => 'con firma electrónica',
            'banner' => 'Sliders/Banner2.png',
            'margin' => 'left'
        ]);

        DB::table('sliders')->insert([
            'title' => 'FILEX',
            'subtitle' => 'Una plataforma para firmar tus documentos',
            'paragraph' => 'con firma electrónica',
            'banner' => 'Sliders/Banner3.png',
            'margin' => 'right'
        ]);

        DB::table('sliders')->insert([
            'title' => 'FILEX',
            'subtitle' => 'Una plataforma para firmar tus documentos',
            'paragraph' => 'con firma electrónica',
            'banner' => 'Sliders/Banner4.png',
            'margin' => 'center'
        ]);
    }
}
