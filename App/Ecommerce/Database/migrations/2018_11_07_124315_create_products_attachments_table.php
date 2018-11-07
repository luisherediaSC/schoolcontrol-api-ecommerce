<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
* 
*
* @author Jorge Alberto Arenas Gutiérrez
*/

class CreateProductsAttachmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_attachments', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('product_id');
            $table->uuid('file_id');
            $table->uuid('content_id');
            $table->identity();
            $table->active();
            $table->timestampsCustom();
            $table->softDeletes();
            
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
        Schema::dropIfExists('products_attachments');
    }
}
