<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdqadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prodqads', function (Blueprint $table) {
            $table->increments('id');
            $table->string('wo_number')->nullable();
            $table->string('wid')->nullable();
            $table->string('wo_part')->nullable();
            $table->string('due_date')->nullable();
            $table->string('salesjob')->nullable();
            $table->string('remarks')->nullable();
            $table->string('operation')->nullable();
            $table->string('wo_name')->nullable();
            $table->string('machine')->nullable();
            $table->string('desc')->nullable();
            
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
        Schema::dropIfExists('prodqads');
    }
}
