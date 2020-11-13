<?php

use Illuminate\Database\Seeder;
use App\SerieIngresso;

class SerieIngressoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('serie_ingresso')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

        $series_ingresso = [
            ['serie_ingresso' => '1a. Série'], 
            ['serie_ingresso' => '2a. Serie'],
            ['serie_ingresso' => '3a. Serie'],
            ['serie_ingresso' => '4a. Serie'],
            ['serie_ingresso' => '5a. Serie'],
            ['serie_ingresso' => '6a. Serie'],
            ['serie_ingresso' => '7a. Serie'],
            ['serie_ingresso' => '8a. Serie'],
            ['serie_ingresso' => '9a. Serie'],
        ];    

        foreach($series_ingresso as $serie_ingresso) {
            SerieIngresso::create(
                ['serie_ingresso' => $serie_ingresso['serie_ingresso']]
            );

        }
    }
}
