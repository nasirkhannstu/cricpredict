<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStadiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stadia', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('h1chase')->nullable();
            $table->string('h2chase')->nullable();
            $table->string('l1chase')->nullable();
            $table->string('l2chase')->nullable();
            $table->string('location')->nullable();
            $table->string('coord')->nullable();
            $table->string('capacity')->nullable();
            $table->string('recordcap')->nullable();
            $table->string('opened')->nullable();
            $table->string('fieldsize')->nullable();
            $table->string('totalmatch')->nullable();
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
        Schema::dropIfExists('stadia');
    }
}
