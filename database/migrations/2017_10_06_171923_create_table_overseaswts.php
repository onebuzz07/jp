<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableOverseaswts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('overseaswts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("sales_id")->nullable();

            $table->decimal('none1')->nullable();
            $table->decimal('none2')->nullable();
            $table->integer('covOrderC')->nullable();
            $table->integer('t1OrderC')->nullable();
            $table->integer('t2OrderC')->nullable();
            $table->integer('t3OrderC')->nullable();
            $table->integer('statOrderC')->nullable();
            $table->integer('flexiOrderC')->nullable();

            $table->integer('covUpC')->nullable();
            $table->integer('t1UpC')->nullable();
            $table->integer('t2UpC')->nullable();
            $table->integer('t3UpC')->nullable();
            $table->integer('statUpC')->nullable();
            $table->integer('flexiUpC')->nullable();

            $table->integer('covSignC')->nullable();
            $table->integer('t1signC')->nullable();
            $table->integer('t2signC')->nullable();
            $table->integer('t3signC')->nullable();
            $table->integer('statSignC')->nullable();
            $table->integer('flexiSignC')->nullable();

            $table->integer('covFrontC')->nullable();
            $table->integer('t1FrontC')->nullable();
            $table->integer('t2FrontC')->nullable();
            $table->integer('t3FrontC')->nullable();
            $table->integer('statFrontC')->nullable();
            $table->integer('flexiFrontC')->nullable();

            $table->integer('covBackC')->nullable();
            $table->integer('t1BackC')->nullable();
            $table->integer('t2BackC')->nullable();
            $table->integer('t3BackC')->nullable();
            $table->integer('statBackC')->nullable();
            $table->integer('flexiBackC')->nullable();

            $table->integer('covSurfC')->nullable();
            $table->integer('t1SurfC')->nullable();
            $table->integer('t2SurfC')->nullable();
            $table->integer('t3SurfC')->nullable();
            $table->integer('statSurfC')->nullable();
            $table->integer('flexiSurfC')->nullable();

            $table->integer('covTrimC')->nullable();
            $table->integer('t1TrimC')->nullable();
            $table->integer('t2TrimC')->nullable();
            $table->integer('t3TrimC')->nullable();
            $table->integer('statTrimC')->nullable();
            $table->integer('flexiTrimC')->nullable();

            $table->integer('covDieC')->nullable();
            $table->integer('t1DieC')->nullable();
            $table->integer('t2DieC')->nullable();
            $table->integer('t3DieC')->nullable();
            $table->integer('statDieC')->nullable();
            $table->integer('flexiDieC')->nullable();

            $table->integer('covStripC')->nullable();
            $table->integer('t1StripC')->nullable();
            $table->integer('t2StripC')->nullable();
            $table->integer('t3stripC')->nullable();
            $table->integer('statStripC')->nullable();
            $table->integer('flexiStripC')->nullable();

            $table->integer('covFoldC')->nullable();
            $table->integer('t1FoldC')->nullable();
            $table->integer('t2FoldC')->nullable();
            $table->integer('t3FoldC')->nullable();
            $table->integer('statFoldC')->nullable();
            $table->integer('flexiFoldC')->nullable();

            $table->integer('covSewC')->nullable();
            $table->integer('t1SewC')->nullable();
            $table->integer('t2SewC')->nullable();
            $table->integer('t3SewC')->nullable();
            $table->integer('statSewC')->nullable();
            $table->integer('flexiSewC')->nullable();

            $table->integer('covBindC')->nullable();
            $table->integer('t1BindC')->nullable();
            $table->integer('t2BindC')->nullable();
            $table->integer('t3BindC')->nullable();
            $table->integer('statBindC')->nullable();
            $table->integer('flexiBindC')->nullable();

            $table->integer('cov3C')->nullable();
            $table->integer('t13C')->nullable();
            $table->integer('t23C')->nullable();
            $table->integer('t33C')->nullable();
            $table->integer('stat3C')->nullable();
            $table->integer('flexi3C')->nullable();

            $table->integer('covPrintC1')->nullable();
            $table->integer('t1PrintC1')->nullable();
            $table->integer('t2PrintC1')->nullable();
            $table->integer('t3PrintC1')->nullable();
            $table->integer('statPrintC1')->nullable();
            $table->integer('flexiPrintC1')->nullable();

            $table->integer('covSurfC1')->nullable();
            $table->integer('t1SurfC1')->nullable();
            $table->integer('t2SurfC1')->nullable();
            $table->integer('t3SurfC1')->nullable();
            $table->integer('statSurfC1')->nullable();
            $table->integer('flexiSurfC1')->nullable();

            $table->integer('covTrimC1')->nullable();
            $table->integer('t1TrimC1')->nullable();
            $table->integer('t2TrimC1')->nullable();
            $table->integer('t3TrimC1')->nullable();
            $table->integer('statTrimC1')->nullable();
            $table->integer('flexiTrimC1')->nullable();

            $table->integer('covDieC1')->nullable();
            $table->integer('t1DieC1')->nullable();
            $table->integer('t2DieC1')->nullable();
            $table->integer('t3DieC1')->nullable();
            $table->integer('statDieC1')->nullable();
            $table->integer('flexiDieC1')->nullable();

            $table->integer('covStripC1')->nullable();
            $table->integer('t1StripC1')->nullable();
            $table->integer('t2StripC1')->nullable();
            $table->integer('t3stripC1')->nullable();
            $table->integer('statStripC1')->nullable();
            $table->integer('flexiStripC1')->nullable();

            $table->integer('covFoldC1')->nullable();
            $table->integer('t1FoldC1')->nullable();
            $table->integer('t2FoldC1')->nullable();
            $table->integer('t3FoldC1')->nullable();
            $table->integer('statFoldC1')->nullable();
            $table->integer('flexiFoldC1')->nullable();

            $table->integer('covSewC1')->nullable();
            $table->integer('t1SewC1')->nullable();
            $table->integer('t2SewC1')->nullable();
            $table->integer('t3SewC1')->nullable();
            $table->integer('statSewC1')->nullable();
            $table->integer('flexiSewC1')->nullable();

            $table->integer('covBindC1')->nullable();
            $table->integer('t1BindC1')->nullable();
            $table->integer('t2BindC1')->nullable();
            $table->integer('t3BindC1')->nullable();
            $table->integer('statBindC1')->nullable();
            $table->integer('flexiBindC1')->nullable();

            $table->integer('cov3C1')->nullable();
            $table->integer('t13C1')->nullable();
            $table->integer('t23C1')->nullable();
            $table->integer('t33C1')->nullable();
            $table->integer('stat3C1')->nullable();
            $table->integer('flexi3C1')->nullable();

            $table->integer('covPackC1')->nullable();
            $table->integer('t1PackC1')->nullable();
            $table->integer('t2PackC1')->nullable();
            $table->integer('t3PackC1')->nullable();
            $table->integer('statPackC1')->nullable();
            $table->integer('flexiPackC1')->nullable();

            $table->integer('ccover')->nullable();
            $table->integer('ccoverready')->nullable();
            $table->integer('ccoverwaste')->nullable();
            $table->integer('flexicover')->nullable();
            $table->integer('flexicoverready')->nullable();
            $table->integer('flexicoverwaste')->nullable();
            $table->integer('ct1')->nullable();
            $table->integer('ct1ready')->nullable();
            $table->integer('ct1waste')->nullable();
            $table->integer('ct2')->nullable();
            $table->integer('ct2ready')->nullable();
            $table->integer('ct2waste')->nullable();
            $table->integer('ct3')->nullable();
            $table->integer('ct3ready')->nullable();
            $table->integer('ct3waste')->nullable();
            $table->integer('csticker')->nullable();
            $table->integer('cstickerready')->nullable();
            $table->integer('cstickerwaste')->nullable();

            $table->integer('surfMake')->nullable();
            $table->decimal('surfWaste')->nullable();
            $table->integer('trimMake')->nullable();
            $table->decimal('trimWaste')->nullable();
            $table->integer('dieMake')->nullable();
            $table->decimal('dieWaste')->nullable();
            $table->integer('stripMake')->nullable();
            $table->decimal('stripWaste')->nullable();
            $table->integer('foldMake')->nullable();
            $table->decimal('foldWaste')->nullable();
            $table->integer('sewMake')->nullable();
            $table->decimal('sewWaste')->nullable();
            $table->integer('bindMake')->nullable();
            $table->decimal('bindWaste')->nullable();
            $table->integer('threeMake')->nullable();
            $table->decimal('threeWaste')->nullable();
            $table->integer('PackMake')->nullable();
            $table->decimal('packWaste')->nullable();

            $table->integer('colMakeFront')->nullable();
            $table->integer('colMakeBack')->nullable();
            $table->decimal('colWaste')->nullable();
            // $table->integer('blaMake')->nullable();
            // $table->decimal('blaWaste')->nullable();

            $table->integer('colMakeFront1')->nullable();
            $table->integer('colMakeBack1')->nullable();
            $table->decimal('colWaste1')->nullable();
            // $table->integer('blaMake1')->nullable();
            // $table->decimal('blaWaste1')->nullable();

            $table->integer('colMakeFront2')->nullable();
            $table->integer('colMakeBack2')->nullable();
            $table->decimal('colWaste2')->nullable();
            // $table->integer('blaMake2')->nullable();
            // $table->decimal('blaWaste2')->nullable();
            $table->integer('colMakeFrontcovback')->nullable();

            $table->integer('flexiOrderC2')->nullable();
            $table->integer('flexiUpC2')->nullable();
            $table->integer('flexiSignC2')->nullable();
            $table->integer('flexiFrontC2')->nullable();
            $table->integer('flexiBackC2')->nullable();
            $table->integer('flexiSurfC2')->nullable();
            $table->integer('flexiTrimC2')->nullable();
            $table->integer('flexiDieC2')->nullable();
            $table->integer('flexiStripC2')->nullable();
            $table->integer('flexiFoldC2')->nullable();
            $table->integer('flexiSewC2')->nullable();
            $table->integer('flexiBindC2')->nullable();
            $table->integer('flexi3C2')->nullable();

            $table->integer('flexiPrintC3')->nullable();
            $table->integer('flexiOrderC3')->nullable();
            $table->integer('flexiSurfC3')->nullable();
            $table->integer('flexiTrimC3')->nullable();
            $table->integer('flexiDieC3')->nullable();
            $table->integer('flexiStripC3')->nullable();
            $table->integer('flexiFoldC3')->nullable();
            $table->integer('flexiSewC3')->nullable();
            $table->integer('flexiBindC3')->nullable();
            $table->integer('flexi3C3')->nullable();
            $table->integer('flexiPackC3')->nullable();

            $table->integer('flexicover1')->nullable();
            $table->integer('flexicoverready1')->nullable();
            $table->integer('flexicoverwaste1')->nullable();

            $table->integer('surfMake1')->nullable();
            $table->decimal('surfWaste1')->nullable();
            $table->integer('trimMake1')->nullable();
            $table->decimal('trimWaste1')->nullable();
            $table->integer('dieMake1')->nullable();
            $table->decimal('dieWaste1')->nullable();
            $table->integer('stripMake1')->nullable();
            $table->decimal('stripWaste1')->nullable();
            $table->integer('foldMake1')->nullable();
            $table->decimal('foldWaste1')->nullable();
            $table->integer('sewMake1')->nullable();
            $table->decimal('sewWaste1')->nullable();
            $table->integer('bindMake1')->nullable();
            $table->decimal('bindWaste1')->nullable();
            $table->integer('threeMake1')->nullable();
            $table->decimal('threeWaste1')->nullable();
            $table->integer('PackMake1')->nullable();
            $table->decimal('packWaste1')->nullable();

            $table->integer('colMakeFront3')->nullable();
            $table->integer('colMakeBack3')->nullable();
            $table->decimal('colWaste3')->nullable();
            // $table->integer('blaMake3')->nullable();
            // $table->decimal('blaWaste3')->nullable();

            $table->integer('colMakeFront4')->nullable();
            $table->integer('colMakeBack4')->nullable();
            $table->decimal('colWaste4')->nullable();
            // $table->integer('blaMake4')->nullable();
            // $table->decimal('blaWaste4')->nullable();

            $table->integer('colMakeFront5')->nullable();
            $table->integer('colMakeBack5')->nullable();
            $table->decimal('colWaste5')->nullable();
            // $table->integer('blaMake5')->nullable();
            // $table->decimal('blaWaste5')->nullable();
            $table->integer('colMakeFrontcovback1')->nullable();

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
        Schema::dropIfExists('overseaswts');
    }
}
