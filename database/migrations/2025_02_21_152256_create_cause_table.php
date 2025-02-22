<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCauseTable extends Migration
{
    public function up()
    {
        Schema::create('cause', function (Blueprint $table) {
            $table->id();
            $table->string('designation');
            $table->primary('id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cause');
    }
}
