<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableWorkorders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workorders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Item_Number')->nullable();
            $table->string('Site')->nullable();
            $table->string('Work_Order')->nullable();
            $table->string('wo_id')->nullable();
            $table->string('Quantity_Ordered')->nullable();
            $table->string('Quantity_Completed')->nullable();
            $table->string('Quantity_Open')->nullable();
            $table->string('Order_Date')->nullable();
            $table->string('Due_Date')->nullable();
            $table->string('SalesJob')->nullable();
            $table->string('Work_Order_Status')->nullable();
            $table->string('Release_Date')->nullable();

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
        Schema::dropIfExists('workorders');
    }
}
