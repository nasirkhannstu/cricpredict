<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('image')->nullable();
            $table->string('teama_id')->nullable();
            $table->string('teamb_id')->nullable();
            $table->string('stadium_id')->nullable();
            $table->string('type_id')->nullable();
            $table->string('ampaira_id')->nullable();
            $table->string('city_id')->nullable();
            $table->string('predict_id')->nullable();
            $table->string('owned_id')->nullable();
            $table->text('des')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('games');
    }
}
