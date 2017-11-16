<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSalesorders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salesorders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Item_Number')->nullable();
            $table->string('Order_Date')->nullable();
            $table->string('Due_Date')->nullable();
            $table->string('Type')->nullable();
            $table->string('Sales_Order')->nullable();
            $table->string('Quantity_Ordered')->nullable();
            $table->string('Quantity_Shipped')->nullable();
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
        Schema::dropIfExists('salesorders');
    }
}
