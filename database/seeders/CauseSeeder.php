<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CauseSeeder extends Seeder
{
    public function run()
    {
        DB::table('cause')->insert([
            ['id' => 1, 'designation' => 'probleme de reseau'],
            ['id' => 2, 'designation' => 'Probleme sur reseau'],
            ['id' => 3, 'designation' => 'Affaissement Terrain'],
        ]);
    }
}



