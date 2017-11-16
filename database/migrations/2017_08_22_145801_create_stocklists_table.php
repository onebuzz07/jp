<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStocklistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocklists', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Item_Number')->nullable();
            $table->string('Date')->nullable();
            $table->string('Effective_Date')->nullable();
            $table->string('Transaction_Type')->nullable();
            $table->string('Order')->nullable();
            $table->string('Quantity_Change')->nullable();
            $table->string('Product_Line')->nullable();
            $table->string('Location')->nullable();
            $table->string('lotserial')->nullable();
            $table->string('Remarks')->nullable();
            $table->timestamps('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stocklists');
    }
}
