<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePowos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('powos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('item_number')->nullable();
            $table->string('reference')->nullable();
            $table->string('due_date')->nullable();
            $table->string('quantity_ordered')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('powos');
    }
}
