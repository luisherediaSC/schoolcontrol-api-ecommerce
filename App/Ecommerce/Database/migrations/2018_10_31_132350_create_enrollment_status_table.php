<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
* 
*
* @author Jorge Alberto Arenas Gutiérrez
*/

class CreateEnrollmentStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enrollment_status', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('name', 75);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enrollment_status');
    }
}
