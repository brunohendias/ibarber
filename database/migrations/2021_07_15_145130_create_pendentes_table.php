<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendentesTable extends Migration
{
    public function up()
    {
        Schema::create('pendentes', function (Blueprint $table) {
            $table->id();
            $table->dateTime('data');
            $table->foreignId('cliente_id')->constrained();
            $table->foreignId('barbeiro_id')->constrained();
            $table->timestamps();
            $table->index(['cliente_id','data','barbeiro_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('pendentes');
    }
}
