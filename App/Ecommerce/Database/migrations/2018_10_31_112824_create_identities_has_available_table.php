<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
* 
*
* @author Jorge Alberto Arenas Gutiérrez
*/

class CreateIdentitiesHasAvailableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('identities_has_available', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('payment_arrangement_id');
            $table->uuid('identity_id');
            $table->identity();
            $table->timestampsCustom();
            $table->softDeletes();
            
            $table->foreign('payment_arrangement_id')
                  ->references('id')
                  ->on('payment_arrangements');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('identities_has_available');
    }
}
