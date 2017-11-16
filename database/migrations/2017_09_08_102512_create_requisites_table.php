<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequisitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requisites', function (Blueprint $table) {
            $table->increments('id');
            $table->string('SRO_number');
            $table->date('dateSRO')->nullable();
            $table->boolean('release')->nullable();
            $table->string('customerName')->nullable();
            $table->string('modelSRO')->nullable();
            $table->string('partDescSRO')->nullable();
            $table->string('partNumberSRO')->nullable();
            $table->string('quantitySRO')->nullable();
            $table->string('sizeSRO')->nullable();
            $table->string('materialSRO')->nullable();
            // $table->string('other_sub')->nullable();
            // $table->string('other_data')->nullable();
            $table->text('remarksSRO')->nullable();
            $table->date('requiredDate')->nullable();
            $table->string('requestedBy')->nullable();
            $table->string('preparedBy')->nullable();
            $table->string('revSRO')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('requisites');
    }
}
