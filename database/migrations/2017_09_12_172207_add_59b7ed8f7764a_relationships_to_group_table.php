<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add59b7ed8f7764aRelationshipsToGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('groups', function(Blueprint $table) {
            if (!Schema::hasColumn('groups', 'admin_id')) {
                $table->integer('admin_id')->unsigned()->nullable();
                $table->foreign('admin_id', '73016_59b7ed4734beb')->references('id')->on('users')->onDelete('cascade');
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
        Schema::table('groups', function(Blueprint $table) {
            
        });
    }
}
