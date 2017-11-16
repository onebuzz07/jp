<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableStockupdatepowos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stockupdatepowos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("items_id")->nullable();
            $table->string("partNo")->nullable();
            // $table->decimal("stock_qad")->nullable();
            $table->string('idNum')->nullable();
            $table->string('POquantity')->nullable();
            $table->string('stock_taken')->nullable();
            $table->string('adj')->nullable();
            $table->string('balance')->nullable();
            $table->string('receiveDate')->nullable();
            $table->string('remarkStock')->nullable();
            $table->SoftDeletes();
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
        Schema::dropIfExists('stockupdatepowos');
    }
}
