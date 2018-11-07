<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
* 
*
* @author Jorge Alberto Arenas Gutiérrez
*/

class CreatePaymentDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_details', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('payment_id');
            $table->uuid('identity_id');
            $table->integer('enrollment_id')->unsigned();
            $table->integer('quantity');
            $table->decimal('amount', 18, 2);
            $table->timestampsCustom();
            $table->softDeletes();
            
            $table->foreign('payment_id')
                  ->references('id')
                  ->on('payments');
            $table->foreign('enrollment_id')
                  ->references('id')
                  ->on('enrollments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment_details');
    }
}
