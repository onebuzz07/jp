<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("sales_id")->nullable();
            $table->string('model')->nullable();
            $table->string('partDesc')->nullable();
            $table->string('partNo')->nullable();
            $table->string('size')->nullable();
            $table->string('quantity')->nullable();
            $table->string('rawMaterial')->nullable();
            $table->boolean('rawcheck')->nullable();
            $table->string('noPages')->nullable();
            $table->string('colour')->nullable();
            $table->string('finishing')->nullable();
            $table->string('qtyOnHand')->nullable();

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
        Schema::dropIfExists('items');
    }
}
