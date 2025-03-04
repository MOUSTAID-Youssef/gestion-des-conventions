<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
class CreateTerrainInterventionTable extends Migration
{
    public function up()
    {
                DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Schema::create('terrain_intervention', function (Blueprint $table) {
            $table->foreignId('id_terrain')->constrained('terrain');
            $table->foreignId('id_intervention')->constrained('intervention');
            $table->primary(['id_terrain', 'id_intervention']);
            $table->timestamps();
        });
                DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }

    public function down()
    {
                DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Schema::dropIfExists('terrain_intervention');
                DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
