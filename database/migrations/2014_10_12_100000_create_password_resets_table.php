<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePasswordResetsTable extends Migration
{
    public function up()
    {
        Schema::create('password_resets', function (Blueprint $table) {
            $table->string('email')->index();
            $table->string('token');
            $table->foreignId('user_id')->constrained();
            $table->timestamp('created_at');
        });
    }

    public function down()
    {
        Schema::dropIfExists('password_resets');
    }
}
