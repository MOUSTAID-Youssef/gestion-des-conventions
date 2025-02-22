<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateMaterielInterventionTable extends Migration
{
    public function up()
    {
                DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Schema::create('materiel_intervention', function (Blueprint $table) {
            $table->foreignId('id_materiel')->constrained('materiel');
            $table->foreignId('id_intervention')->constrained('intervention');
            $table->primary(['id_materiel', 'id_intervention']);
            $table->timestamps();
        });
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }

    public function down()
    {
                DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Schema::dropIfExists('materiel_intervention');
                DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
