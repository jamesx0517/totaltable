<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePcrepairTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pcrepairs', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->integer('uid');
            $table->integer('pid');
            $table->integer('category');
            $table->integer('project');
            $table->integer('nature');
            $table->string('note');
            $table->date('enddate');
            $table->integer('status');
            $table->integer('it');
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
        Schema::dropIfExists('pcrepairs');
    }
}
