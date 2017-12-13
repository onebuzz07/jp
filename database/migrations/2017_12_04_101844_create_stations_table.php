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
            $table->string('sco_number')->nullable();
            $table->string('job_id')->nullable();
            $table->string('station')->nullable();
            $table->string('remarks')->nullable();
            $table->string('remarksQAD')->nullable();
            $table->string('check')->nullable();
            $table->string('timein')->nullable();
            $table->string('timeout')->nullable();

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
