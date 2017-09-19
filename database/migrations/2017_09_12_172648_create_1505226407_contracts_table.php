<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1505226407ContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         if( !Schema::hasTable('contracts')) {
            Schema::create('contracts', function (Blueprint $table) {
                 $table->increments('id');
                 $table->string('contractsname')->nullable();
                $table->string('salutation')->nullable();
                $table->string('f_name')->nullable();
                $table->string('l_name')->nullable();
                $table->integer('zihlerpunktnummer')->nullable();
                $table->string('telephone',14)->nullable();
                $table->string('mobile',14)->nullable();
                $table->string('fax',14)->nullable();
                $table->double('consumption_HT',10,3)->nullable();
                $table->double('consumption_NT',10,3)->nullable();
                $table->string('powersupplier')->nullable();
                $table->double('tension_MS',10,3)->nullable();
                $table->double('tension_HS',10,3)->nullable();
                 $table->date('end_date')->nullable();

                 $table->timestamps();
                 $table->softDeletes();

                 $table->index(['deleted_at']);
            });
         }
        // Schema::table('user_actions', function(Blueprint $table) {
        //     if (!Schema::hasColumn('user_actions', 'user_id')) {
        //         $table->integer('user_id')->unsigned()->nullable();
        //         $table->foreign('user_id', '73021_59b7ed570b636')->references('id')->on('users')->onDelete('cascade');
        //         }
        //
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contracts');
    }
}
