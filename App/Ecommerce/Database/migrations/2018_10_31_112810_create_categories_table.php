<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
* 
*
* @author Jorge Alberto Arenas Gutiérrez
*/

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->identity();
            $table->uuid('branch_id');
            $table->string('name', 75);
            $table->timestampsCustom();
            $table->active();
            $table->integer('parent_id')->nullable();
            $table->string('description', 200)->nullable();
            
            $table->foreign('branch_id')
                  ->references('id')
                  ->on('branches');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
