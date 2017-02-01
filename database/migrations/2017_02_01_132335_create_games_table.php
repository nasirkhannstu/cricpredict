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
            $table->integer('teama_id')->nullable()->unsigned();
            $table->integer('teamb_id')->nullable()->unsigned();
            $table->integer('stadium_id')->nullable()->unsigned();
            $table->integer('type_id')->nullable()->unsigned();
            $table->integer('ampaira_id')->nullable()->unsigned();
            $table->integer('coach')->nullable()->unsigned();
            $table->integer('city_id')->nullable()->unsigned();
            $table->integer('predict_id')->nullable();
            $table->integer('owned_id')->nullable();
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
