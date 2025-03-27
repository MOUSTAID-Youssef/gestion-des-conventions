<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Informations;
use Illuminate\Support\Facades\DB;

class InformationsSeeder extends Seeder
{
    public function run()
    {
        Informations::create([
            'raison_sociale' => 'WATEC',
            'adresse' => 'Lot 282 Zone Industriel Sud Ouest Mohammedia',
            'telephone' => '+212(0)523301101',
            'email' => 'info@watec.ma',
        ]);


        Informations::factory()->create([
            'raison_sociale' => 'WATEC',
            'adresse' => 'Lot 282 Zone Industriel Sud Ouest Mohammedia',
            'telephone' => '+212(0)523301101',
            'email' => 'info@watec.ma',
        ]);

        DB::table('informations')->insert([
            [
                'raison_sociale' => 'WATEC',
                'adresse' => 'Lot 282 Zone Industriel Sud Ouest Mohammedia',
                'telephone' => '+212(0)523301101',
                'email' => 'info@watec.ma',
            ],
        ]);
    }
}
