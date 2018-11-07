<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Melisa\Laravel\Database\MigrationTrait;

/**
* 
*
* @author Jorge Alberto Arenas Gutiérrez
*/

class CreateBranchesTable extends Migration
{
    use MigrationTrait;
    
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->removeOauthTables();
        Schema::create('branches', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name', 100);
            $table->timestampsCustom();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('branches');
        $this->removeOauthTables();
    }
}
