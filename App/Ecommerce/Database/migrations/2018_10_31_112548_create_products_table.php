<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
* 
*
* @author Jorge Alberto Arenas Gutiérrez
*/

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->identity();
            $table->uuid('branch_id');
            $table->smallInteger('status_id')->unsigned();
            $table->smallInteger('product_type_id')->unsigned();
            $table->string('name', 75);
            $table->active();
            $table->timestampsCustom();
            $table->softDeletes();
            $table->string('description', 200)->nullable();
            
            $table->foreign('branch_id')
                  ->references('id')
                  ->on('branches');
            $table->foreign('status_id')
                  ->references('id')
                  ->on('products_status');
            $table->foreign('product_type_id')
                  ->references('id')
                  ->on('product_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
