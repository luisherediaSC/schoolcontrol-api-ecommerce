<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
* 
*
* @author Jorge Alberto Arenas Gutiérrez
*/

class CreateShoopingCartItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shooping_cart_items', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('shooping_cart_id');
            $table->uuid('product_id');
            $table->integer('quantity');
            $table->decimal('amount', 18, 2);
            $table->decimal('subtotal', 18, 2);
            $table->timestampsCustom();
            
            $table->foreign('shooping_cart_id')
                  ->references('id')
                  ->on('shooping_cart');
            
            $table->foreign('product_id')
                  ->references('id')
                  ->on('products');
                    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shooping_cart_items');
    }
}
