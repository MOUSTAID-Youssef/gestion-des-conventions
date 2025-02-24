<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Informations;

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
    }
}
