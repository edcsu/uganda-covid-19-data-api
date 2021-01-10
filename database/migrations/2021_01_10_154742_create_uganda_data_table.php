<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUgandaDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uganda_data', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->integer('total_cases');
            $table->integer('new_cases');
            $table->integer('new_deaths');
            $table->integer('total_deaths');
            $table->integer('new_recoveries');
            $table->integer('total_recoveries');
            $table->integer('new_tests');
            $table->integer('total_tests');
            $table->date('date_for');
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
        Schema::dropIfExists('uganda_data');
    }
}
