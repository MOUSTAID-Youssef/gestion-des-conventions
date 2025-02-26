<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateInterventionTable extends Migration
{
    public function up()
    {
                DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Schema::create('intervention', function (Blueprint $table) {
            $table->id();
            $table->string('libelle');
            $table->date('date_intervention');
            $table->foreignId('id_ville')->constrained('ville');
            $table->string('adresse');
            $table->string('photo');
            $table->float('latitude', 10, 6);
            $table->float('longitude', 10, 6);
            $table->foreignId('id_equipe')->constrained('equipe');
            $table->foreignId('id_cause')->constrained('cause');
            $table->foreignId('id_type_intervention')->constrained('type_intervention');
            $table->foreignId('id_utilisateur')->constrained('utilisateur');
            $table->timestamps();
        });
                DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }

    public function down()
    {
                DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Schema::dropIfExists('intervention');
                DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
