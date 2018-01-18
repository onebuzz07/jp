<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('productions_id')->nullable();
            $table->string('sales_id')->nullable();
            $table->string('wid')->nullable();
            $table->string('workorder')->nullable();
            $table->string('operation')->nullable();
            $table->string('salesjob')->nullable();
            $table->string('station')->nullable();
            $table->longtext('remarks')->nullable();
            $table->longtext('remarksQAD')->nullable();
            $table->string('desc')->nullable();
            $table->string('code')->nullable();
            $table->string('wo_operation')->nullable();
            $table->string('check')->nullable();
            $table->string('timein')->nullable();
            $table->string('timeout')->nullable();
            $table->longtext('keyproduction')->nullable();

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
        Schema::dropIfExists('stations');
    }
}
