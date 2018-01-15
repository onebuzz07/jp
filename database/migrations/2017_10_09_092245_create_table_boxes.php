<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableBoxes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boxes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('typeofformula')->nullable();
            $table->integer("sales_id")->nullable();
            $table->integer("user")->nullable();
            $table->integer("workorders_id")->nullable();
            $table->integer('order1')->nullable();
            $table->integer('order2')->nullable();
            $table->integer('order3')->nullable();
            $table->integer('order4')->nullable();
            $table->integer('up1')->nullable();
            $table->integer('up2')->nullable();
            $table->integer('up3')->nullable();
            $table->integer('up4')->nullable();
            $table->integer('front2')->nullable();
            $table->integer('front1')->nullable();
            $table->integer('back1')->nullable();
            $table->integer('back2')->nullable();
            $table->integer('surf1')->nullable();
            $table->integer('surf2')->nullable();
            $table->integer('trim1')->nullable();
            $table->integer('trim2')->nullable();
            $table->integer('trim3')->nullable();
            $table->integer('trim4')->nullable();
            $table->integer('flute1')->nullable();
            $table->integer('flute2')->nullable();
            $table->integer('flute3')->nullable();
            $table->integer('flute4')->nullable();
            $table->integer('die1')->nullable();
            $table->integer('die2')->nullable();
            $table->integer('die3')->nullable();
            $table->integer('die4')->nullable();
            $table->integer('strip1')->nullable();
            $table->integer('strip2')->nullable();
            $table->integer('strip3')->nullable();
            $table->integer('strip4')->nullable();
            $table->integer('window1')->nullable();
            $table->integer('window2')->nullable();
            $table->integer('window3')->nullable();
            $table->integer('window4')->nullable();
            $table->integer('glue1')->nullable();
            $table->integer('glue2')->nullable();
            $table->integer('glue3')->nullable();
            $table->integer('glue4')->nullable();
            $table->integer('print11')->nullable();
            $table->integer('print12')->nullable();
            $table->integer('surf11')->nullable();
            $table->integer('surf12')->nullable();
            $table->integer('trim11')->nullable();
            $table->integer('trim12')->nullable();
            $table->integer('trim13')->nullable();
            $table->integer('trim14')->nullable();
            $table->integer('flute11')->nullable();
            $table->integer('flute12')->nullable();
            $table->integer('flute13')->nullable();
            $table->integer('flute14')->nullable();
            $table->integer('die11')->nullable();
            $table->integer('die12')->nullable();
            $table->integer('die13')->nullable();
            $table->integer('die14')->nullable();
            $table->integer('strip11')->nullable();
            $table->integer('strip12')->nullable();
            $table->integer('strip13')->nullable();
            $table->integer('strip14')->nullable();
            $table->integer('window11')->nullable();
            $table->integer('window12')->nullable();
            $table->integer('window13')->nullable();
            $table->integer('window14')->nullable();
            $table->integer('glue11')->nullable();
            $table->integer('glue12')->nullable();
            $table->integer('glue13')->nullable();
            $table->integer('glue14')->nullable();
            $table->integer('pack11')->nullable();
            $table->integer('pack12')->nullable();
            $table->integer('pack13')->nullable();
            $table->integer('pack14')->nullable();
            $table->integer('wastecardC')->nullable();
            $table->integer('reqwastecardC')->nullable();
            $table->integer('paperwastecardC')->nullable();
            $table->integer('wastecardB')->nullable();
            $table->integer('reqwastecardB')->nullable();
            $table->integer('paperwastecardB')->nullable();
            $table->integer('wastefluteC')->nullable();
            $table->integer('paperwastefluteC')->nullable();
            $table->integer('wastefluteB')->nullable();
            $table->integer('paperwastefluteB')->nullable();
            $table->integer('some1')->nullable();
            $table->decimal('some2')->nullable();
            $table->integer('some3')->nullable();
            $table->decimal('some4')->nullable();
            $table->integer('some5')->nullable();
            $table->integer('some6')->nullable();
            $table->decimal('some7')->nullable();
            $table->integer('some8')->nullable();
            $table->integer('colMakeFront')->nullable();
            $table->integer('colMakeBack')->nullable();
            $table->decimal('colWaste')->nullable();
            $table->integer('blaMake')->nullable();
            $table->decimal('blaWaste')->nullable();
            $table->integer('surfMake')->nullable();
            $table->decimal('surfWaste')->nullable();
            $table->integer('trimMake')->nullable();
            $table->decimal('trimWaste')->nullable();
            $table->integer('flutemake')->nullable();
            $table->decimal('flutewaste')->nullable();
            $table->integer('diemake')->nullable();
            $table->decimal('diewaste')->nullable();
            $table->integer('stripmake')->nullable();
            $table->decimal('stripwaste')->nullable();
            $table->integer('windowsmake')->nullable();
            $table->decimal('windowswaste')->nullable();
            $table->integer('glueflutemake')->nullable();
            $table->decimal('glueflutewaste')->nullable();
            $table->integer('gluemake')->nullable();
            $table->decimal('gluewaste')->nullable();
            $table->integer('PackMake')->nullable();
            $table->decimal('packWaste')->nullable();

            $table->integer('totalqty')->nullable();
            $table->integer('totalpaper')->nullable();

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
        Schema::dropIfExists('boxes');
    }
}
