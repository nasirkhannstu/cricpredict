<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('pla')->nullable();
            $table->string('plb')->nullable();
            $table->string('plc')->nullable();
            $table->string('pld')->nullable();
            $table->string('ple')->nullable();
            $table->string('plf')->nullable();
            $table->string('plg')->nullable();
            $table->string('plh')->nullable();
            $table->string('pli')->nullable();
            $table->string('plj')->nullable();
            $table->string('plk')->nullable();
            $table->string('pll')->nullable();
            $table->string('plm')->nullable();
            $table->string('pln')->nullable();
            $table->string('plo')->nullable();
            $table->string('plp')->nullable();
            $table->string('plq')->nullable();
            $table->string('plr')->nullable();
            $table->string('coach')->nullable();
            $table->string('image')->nullable();
            $table->text('desa');
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
        Schema::dropIfExists('teams');
    }
}
