<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->decimal('netz_base',2,2)->nullable();
            $table->double('netz_invoice',5,3)->nullable();
            $table->double('netz_reading',5,3)->nullable();
            $table->double('netz_base_metering',5,3)->nullable();
            $table->double('netz_work',5,3)->nullable();
            $table->double('netz_work_nt',5,3)->nullable();
            $table->double('netz_concession_fee',5,3)->nullable();
            $table->string('netz_markt')->nullable();
            $table->string('netz_type')->nullable();
            $table->integer('netz_markt_type_id')->unsigned()->nullable();
            $table->double('fee_price_eeg',5,3)->nullable();
            $table->double('fee_price_kwk',5,3)->nullable();
            $table->double('fee_price_19',5,3)->nullable();
            $table->double('fee_price_abLa',5,3)->nullable();
            $table->double('fee_price_energy',5,3)->nullable();
            $table->double('fee_price_offshore',5,3)->nullable();
            $table->double('sum_base',9,3)->nullable();
            $table->double('sum_work',9,3)->nullable();
            $table->double('sum_work_nt',9,3)->nullable();
            $table->string('remember_token')->nullable();
            $table->timestamps();
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
