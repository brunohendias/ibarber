<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarbeirosTable extends Migration
{
    public function up()
    {
        Schema::create('barbeiros', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('email')->unique();
            $table->foreignId('endereco_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->time('horario_inicio')->default('08:00:00');
            $table->time('horario_fim')->default('20:00:00');
            $table->char('semAgenda')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('barbeiros');
    }
}
