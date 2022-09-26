<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManagerTableTest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manager_table_test', function (Blueprint $table) {
            $table->id();
            $table->string('type_transacction');
            $table->string('mainjisa');
            $table->string('namejisa');
            $table->string('agencyjisa');
            $table->string('nameagency');
            $table->string('companyjisa');
            $table->string('namecompany');
            $table->string('type_account');
            $table->string('code_driver');
            $table->string('name_driver');
            $table->string('withdraw');
            $table->string('recharge');
            $table->string('notes');
            $table->string('content');
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
        Schema::dropIfExists('manager_table_test');
    }
}
