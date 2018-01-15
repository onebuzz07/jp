<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePlannings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plannings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('typeofformula')->nullable();
            $table->integer("user")->nullable();
            $table->integer('sales_id')->nullable();
            $table->integer("workorders_id")->nullable();
            $table->integer('aread')->nullable();
            $table->double('incharead')->nullable();
            $table->integer('areaw')->nullable();
            $table->double('inchareaw')->nullable();
            $table->double('papergsm')->nullable();
            $table->double('up')->nullable();
            $table->double('qty')->nullable();
            $table->double('ink')->nullable();
            $table->integer('total')->nullable();
            $table->bigInteger('calcsheet')->nullable();
            $table->double('calcmt')->nullable();
            $table->double('paperink')->nullable();
            $table->double('duplexink')->nullable();
            $table->double('paperissue')->nullable();
            $table->double('duplexissue')->nullable();
            $table->double('calculation1')->nullable();
            $table->double('calculation2')->nullable();
            $table->integer('length')->nullable();
            $table->integer('width')->nullable();
            $table->integer('weight')->nullable();
            $table->integer('paperqty')->nullable();
            $table->double('calcinmt')->nullable();
            $table->bigInteger('permt')->nullable();
            $table->double('mt')->nullable();
            $table->integer('sh')->nullable();

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
        Schema::dropIfExists('plannings');
    }
}
