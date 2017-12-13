<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSheetingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sheetings', function (Blueprint $table) {

            $table->increments('id');
            $table->string('sco_number')->nullable();
            $table->string('salesorder')->nullable();
            $table->string('supplier')->nullable();
            $table->string('item_number')->nullable();
            $table->string('desc')->nullable();
            $table->string('size')->nullable();
            $table->string('pageNo')->nullable();
            $table->string('qty')->nullable();
            $table->string('price')->nullable();
            $table->string('due_date')->nullable();
            $table->string('customerid')->nullable();
            $table->string('partNo')->nullable();

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
        Schema::dropIfExists('sheetings');
    }
}
