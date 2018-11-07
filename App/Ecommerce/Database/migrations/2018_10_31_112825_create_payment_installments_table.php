<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
* 
*
* @author Jorge Alberto Arenas Gutiérrez
*/

class CreatePaymentInstallmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_installments', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('payment_arrangement_id');
            $table->identity();
            $table->smallInteger('order');
            $table->decimal('base_amount', 18,2);
            $table->active();
            $table->timestampsCustom();
            $table->softDeletes();
            $table->string('name', 75)->nullable();
            $table->text('logic_bussiness')->nullable();
            
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
        Schema::dropIfExists('payment_installments');
    }
}
