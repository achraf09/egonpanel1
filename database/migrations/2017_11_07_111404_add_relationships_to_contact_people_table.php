<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelationshipsToContactPeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('contact_people', function(Blueprint $table) {
            if (!Schema::hasColumn('contact_people', 'suppliers_id')) {
                $table->integer('suppliers_id')->unsigned()->nullable();
                $table->foreign('suppliers_id')->references('id')->on('suppliers')->onDelete('cascade');
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
        //
        Schema::table('contact_people', function(Blueprint $table) {

        });
    }
}
