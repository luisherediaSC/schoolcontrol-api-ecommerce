<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
* 
*
* @author Jorge Alberto Arenas Gutiérrez
*/

class CreateBranchModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branch_models', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('branch_id');
            $table->uuid('model_id');
            $table->identity();
            $table->timestampsCustom();
            $table->softDeletes();
            
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
        Schema::dropIfExists('branch_models');
    }
}
