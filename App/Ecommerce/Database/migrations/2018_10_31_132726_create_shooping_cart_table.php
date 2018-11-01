<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
* 
*
* @author Jorge Alberto Arenas Gutiérrez
*/

class CreateShoopingCartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shooping_cart', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->identity();
            $table->smallInteger('shooping_cart_status_id')->unsigned();
            $table->smallInteger('total_products');
            $table->decimal('subtotal', 18, 2);
            $table->decimal('iva_apply', 18, 2);
            $table->decimal('total', 18, 2);
            $table->timestampsCustom();
            
            $table->foreign('shooping_cart_status_id')
                  ->references('id')
                  ->on('shooping_cart_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shooping_cart');
    }
}
