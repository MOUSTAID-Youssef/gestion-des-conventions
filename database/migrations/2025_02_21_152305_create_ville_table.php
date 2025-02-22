<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVilleTable extends Migration
{
    public function up()
    {
        Schema::create('ville', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->float('latitude', 10, 6);
            $table->float('longitude', 10, 6);
            $table->float('lat1', 10, 6);
            $table->float('lat2', 10, 6);
            $table->float('lng1', 10, 6);
            $table->float('lng2', 10, 6);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ville');
    }
}
