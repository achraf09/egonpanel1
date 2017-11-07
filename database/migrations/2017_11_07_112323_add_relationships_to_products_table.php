<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelationshipsToProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('products', function(Blueprint $table) {
            if (!Schema::hasColumn('products', 'suppliers_id')) {
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
      Schema::table('products', function(Blueprint $table) {

      });
        //
    }
}
