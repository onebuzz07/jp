<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesqadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salesqads', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Sales_Order')->nullable();
            $table->string('Purchase_order')->nullable();
            $table->string('Sold_To')->nullable();
            $table->string('Name')->nullable();
            $table->string('Line')->nullable();
            $table->string('Item_Number')->nullable();
            $table->string('Description')->nullable();
            $table->string('Description_1')->nullable();
            $table->string('Quantity_Ordered')->nullable();
            $table->string('Order_Date')->nullable();
            $table->string('Due_Date')->nullable();
            $table->string('status')->nullable();
            $table->unique(array('Sales_Order', 'Line'));
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
        Schema::dropIfExists('salesqads');
    }
}
