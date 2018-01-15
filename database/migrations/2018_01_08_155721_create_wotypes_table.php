<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWotypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wotypes', function (Blueprint $table) {
            $table->increments('id');
            
            $table->string('workorders_id')->nullable();
            $table->string('typeofformula')->nullable();
            $table->string('paper_sup')->nullable();
            $table->string('printqty')->nullable();

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
        Schema::dropIfExists('wotypes');
    }
}
