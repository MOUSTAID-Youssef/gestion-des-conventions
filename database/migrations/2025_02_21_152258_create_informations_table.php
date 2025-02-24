<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformationsTable extends Migration
{
    public function up()
    {
        Schema::create('informations', function (Blueprint $table) {
            $table->id();
            $table->string('raison_sociale')->nullable();
            $table->string('adresse')->nullable();
            $table->string('telephone', 25)->nullable();
            $table->string('email')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('informations');
    }
}

