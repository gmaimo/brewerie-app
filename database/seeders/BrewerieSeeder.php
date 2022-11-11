<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrewerieSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        $breweries = [
            [1, 'Irish Pub', 'Cervecería con música en directo los fines de semana, disponen de cervezas típicas irlandesas ademas de una carta de aperitivos.'],
            [2, 'lOrient', 'Cervecería con amplia carta de cervezas situada en el centro de Palma. Disponen de mas de 100 marcas.'],
            [3, 'Ventures', 'Amplia variedad de cervezas Americanas.'],
            [4, 'El Último Mohicano','Local con música ambiente y poledance show. La cerveza es lo de menos.'],
            [5, 'Món','Cerveza artesana de tirador. Pequeño local acogedor situado en Sineu.']
        ];

        foreach ($breweries as $brewerie){
            DB::table('breweries')->insert ([
                'name' => $brewerie[1],
                'description' => $brewerie[2],
                'url' => ''
            ]);
        }
    }
}
