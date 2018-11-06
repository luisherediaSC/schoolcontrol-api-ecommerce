<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
* 
*
* @author Jorge Alberto Arenas Gutiérrez
*/

class CreateEnrollmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enrollments', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('payment_installment_id');
            $table->uuid('identity_id');
            $table->smallInteger('enrollment_status_id');
            $table->identity();
            $table->timestampsCustom();
            $table->softDeletes();
            
            $table->foreign('payment_installment_id')
                ->references('id')
                ->on('payment_installments');
            $table->foreign('enrollment_status_id')
                ->references('id')
                ->on('enrollment_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enrollments');
    }
}
