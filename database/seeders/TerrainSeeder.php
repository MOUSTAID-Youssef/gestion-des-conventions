<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Terrain;

class TerrainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    // {
    //     DB::table('terrain')->insert([
    //         [
    //             'designation' => '00000000',
    //             'created_at' => now(),
    //             'updated_at' => now(),
    //         ],
    //         [
    //             'designation' => '222222',
    //             'created_at' => now(),
    //             'updated_at' => now(),
    //         ],
    //         [
    //             'designation' => '333333333',
    //             'created_at' => now(),
    //             'updated_at' => now(),
    //         ],
    //         [
    //             'designation' => '33333333',
    //             'created_at' => now(),
    //             'updated_at' => now(),
    //         ],
    //     ]);
    // }
    {
        Terrain::factory()->count(5)->create();
    }
}
