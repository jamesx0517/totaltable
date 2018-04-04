<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DeleteDateEnddate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pcrepairs', function (Blueprint $table) {
            $table->dropColumn('date');
            $table->dropColumn('enddate');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pcrepairs', function (Blueprint $table) {
            $table->date('enddate');
            $table->date('date');
        });
    }
}
