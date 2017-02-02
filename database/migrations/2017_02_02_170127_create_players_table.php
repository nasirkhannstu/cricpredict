<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('born')->nullable();
            $table->string('year')->nullable();
            $table->string('age')->nullable();
            $table->string('type')->nullable();
            $table->string('batstyle')->nullable();
            $table->string('bowlstyle')->nullable();
            $table->string('wickets')->nullable();
            $table->string('avgrun')->nullable();
            $table->string('matchplayed')->nullable();
            $table->string('image')->nullable();
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
        Schema::dropIfExists('players');
    }
}
