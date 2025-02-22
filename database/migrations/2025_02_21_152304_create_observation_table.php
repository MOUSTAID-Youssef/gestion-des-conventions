<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
class CreateObservationTable extends Migration
{
    public function up()
    {
                DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Schema::create('observation', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_intervention')->constrained('intervention');
            $table->text('designation');
            $table->timestamps();
        });
                DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }

    public function down()
    {
                DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Schema::dropIfExists('observation');
                DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}

