<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1505225943UsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            
if (!Schema::hasColumn('users', 'lastname')) {
                $table->string('lastname')->nullable();
                }
if (!Schema::hasColumn('users', 'birthdate')) {
                $table->date('birthdate')->nullable();
                }
if (!Schema::hasColumn('users', 'address')) {
                $table->string('address')->nullable();
                }
if (!Schema::hasColumn('users', 'profilphoto')) {
                $table->string('profilphoto')->nullable();
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
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('lastname');
            $table->dropColumn('birthdate');
            $table->dropColumn('address');
            $table->dropColumn('profilphoto');
            
        });

    }
}
