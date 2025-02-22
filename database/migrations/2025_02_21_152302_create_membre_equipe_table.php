<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
class CreateMembreEquipeTable extends Migration
{
    public function up()
    {
                DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Schema::create('membre_equipe', function (Blueprint $table) {
            $table->foreignId('id_membre')->constrained('membre');
            $table->foreignId('id_equipe')->constrained('equipe');
            $table->primary(['id_membre', 'id_equipe']);
            $table->timestamps();
        });
                DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }

    public function down()
    {
                DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Schema::dropIfExists('membre_equipe');
                DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
