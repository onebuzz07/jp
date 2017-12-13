<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBalancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('balances', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sco_number')->nullable();
            $table->string('salesorder')->nullable();
            $table->string('date')->nullable();
            $table->string('job_no')->nullable();
            $table->string('grn_no')->nullable();
            $table->string('inmt')->nullable();
            $table->string('outmt')->nullable();
            $table->string('balance')->nullable();
            $table->string('remark')->nullable();

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
        Schema::dropIfExists('balances');
    }
}
