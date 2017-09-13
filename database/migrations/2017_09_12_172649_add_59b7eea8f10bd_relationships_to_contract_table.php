<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add59b7eea8f10bdRelationshipsToContractTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contracts', function(Blueprint $table) {
            if (!Schema::hasColumn('contracts', 'owner_id')) {
                $table->integer('owner_id')->unsigned()->nullable();
                $table->foreign('owner_id', '73023_59b7eea81a093')->references('id')->on('users')->onDelete('cascade');
                }
                
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contracts', function(Blueprint $table) {
            
        });
    }
}
