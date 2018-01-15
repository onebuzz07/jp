<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSoftCovers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soft_covers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('typeofformula')->nullable();
            $table->integer("user")->nullable();
            $table->integer("sales_id")->nullable();
            $table->integer("workorders_id")->nullable();
            $table->decimal('half')->nullable();
            $table->integer('covOrderC')->nullable();
            $table->integer('t1OrderC')->nullable();
            $table->integer('t2OrderC')->nullable();
            $table->integer('t3OrderC')->nullable();
            $table->integer('statOrderC')->nullable();
            $table->integer('covOrderB')->nullable();
            $table->integer('t1OrderB')->nullable();
            $table->integer('t2OrderB')->nullable();
            $table->integer('t3OrderB')->nullable();
            $table->integer('statOrderB')->nullable();

            $table->integer('covUpC')->nullable();
            $table->integer('t1UpC')->nullable();
            $table->integer('t2UpC')->nullable();
            $table->integer('t3UpC')->nullable();
            $table->integer('statUpC')->nullable();
            $table->integer('covUpB')->nullable();
            $table->integer('t1UpB')->nullable();
            $table->integer('t2UpB')->nullable();
            $table->integer('t3UpB')->nullable();
            $table->integer('statUpB')->nullable();

            $table->integer('covSignC')->nullable();
            $table->integer('t1signC')->nullable();
            $table->integer('t2signC')->nullable();
            $table->integer('t3signC')->nullable();
            $table->integer('statSignC')->nullable();
            $table->integer('covSignB')->nullable();
            $table->integer('t1signB')->nullable();
            $table->integer('t2signB')->nullable();
            $table->integer('t3signB')->nullable();
            $table->integer('statSignB')->nullable();

            $table->integer('covFrontC')->nullable();
            $table->integer('t1FrontC')->nullable();
            $table->integer('t2FrontC')->nullable();
            $table->integer('t3FrontC')->nullable();
            $table->integer('statFrontC')->nullable();
            $table->integer('covFrontB')->nullable();
            $table->integer('t1FrontB')->nullable();
            $table->integer('t2FrontB')->nullable();
            $table->integer('t3FrontB')->nullable();
            $table->integer('statFrontB')->nullable();

            $table->integer('covBackC')->nullable();
            $table->integer('t1BackC')->nullable();
            $table->integer('t2BackC')->nullable();
            $table->integer('t3BackC')->nullable();
            $table->integer('statBackC')->nullable();
            $table->integer('covBackB')->nullable();
            $table->integer('t1BackB')->nullable();
            $table->integer('t2BackB')->nullable();
            $table->integer('t3BackB')->nullable();
            $table->integer('statBackB')->nullable();

            $table->integer('covSurfC')->nullable();
            $table->integer('t1SurfC')->nullable();
            $table->integer('t2SurfC')->nullable();
            $table->integer('t3SurfC')->nullable();
            $table->integer('statSurfC')->nullable();
            $table->integer('covSurfB')->nullable();
            $table->integer('t1SurfB')->nullable();
            $table->integer('t2SurfB')->nullable();
            $table->integer('t3SurfB')->nullable();
            $table->integer('statSurfB')->nullable();

            $table->integer('covTrimC')->nullable();
            $table->integer('t1TrimC')->nullable();
            $table->integer('t2TrimC')->nullable();
            $table->integer('t3TrimC')->nullable();
            $table->integer('statTrimC')->nullable();
            $table->integer('covTrimB')->nullable();
            $table->integer('t1TrimB')->nullable();
            $table->integer('t2TrimB')->nullable();
            $table->integer('t3TrimB')->nullable();
            $table->integer('statTrimB')->nullable();

            $table->integer('covDieC')->nullable();
            $table->integer('t1DieC')->nullable();
            $table->integer('t2DieC')->nullable();
            $table->integer('t3DieC')->nullable();
            $table->integer('statDieC')->nullable();
            $table->integer('covDieB')->nullable();
            $table->integer('t1DieB')->nullable();
            $table->integer('t2DieB')->nullable();
            $table->integer('t3DieB')->nullable();
            $table->integer('statDieB')->nullable();

            $table->integer('covStripC')->nullable();
            $table->integer('t1StripC')->nullable();
            $table->integer('t2StripC')->nullable();
            $table->integer('t3stripC')->nullable();
            $table->integer('statStripC')->nullable();
            $table->integer('covStripB')->nullable();
            $table->integer('t1StripB')->nullable();
            $table->integer('t2StripB')->nullable();
            $table->integer('t3stripB')->nullable();
            $table->integer('statStripB')->nullable();

            $table->integer('covFoldC')->nullable();
            $table->integer('t1FoldC')->nullable();
            $table->integer('t2FoldC')->nullable();
            $table->integer('t3FoldC')->nullable();
            $table->integer('statFoldC')->nullable();
            $table->integer('covFoldB')->nullable();
            $table->integer('t1FoldB')->nullable();
            $table->integer('t2FoldB')->nullable();
            $table->integer('t3FoldB')->nullable();
            $table->integer('statFoldB')->nullable();

            $table->integer('covSewC')->nullable();
            $table->integer('t1SewC')->nullable();
            $table->integer('t2SewC')->nullable();
            $table->integer('t3SewC')->nullable();
            $table->integer('statSewC')->nullable();
            $table->integer('covSewB')->nullable();
            $table->integer('t1SewB')->nullable();
            $table->integer('t2SewB')->nullable();
            $table->integer('t3SewB')->nullable();
            $table->integer('statSewB')->nullable();

            $table->integer('covBindC')->nullable();
            $table->integer('t1BindC')->nullable();
            $table->integer('t2BindC')->nullable();
            $table->integer('t3BindC')->nullable();
            $table->integer('statBindC')->nullable();
            $table->integer('covBindB')->nullable();
            $table->integer('t1BindB')->nullable();
            $table->integer('t2BindB')->nullable();
            $table->integer('t3BindB')->nullable();
            $table->integer('statBindB')->nullable();

            $table->integer('cov3C')->nullable();
            $table->integer('t13C')->nullable();
            $table->integer('t23C')->nullable();
            $table->integer('t33C')->nullable();
            $table->integer('stat3C')->nullable();
            $table->integer('cov3B')->nullable();
            $table->integer('t13B')->nullable();
            $table->integer('t23B')->nullable();
            $table->integer('t33B')->nullable();
            $table->integer('stat3B')->nullable();

            $table->integer('covPrintC')->nullable();
            $table->integer('t1PrintC')->nullable();
            $table->integer('t2PrintC')->nullable();
            $table->integer('t3PrintC')->nullable();
            $table->integer('statPrintC')->nullable();
            $table->integer('covPrintB')->nullable();
            $table->integer('t1PrintB')->nullable();
            $table->integer('t2PrintB')->nullable();
            $table->integer('t3PrintB')->nullable();
            $table->integer('statPrintB')->nullable();

            $table->integer('covSurfC1')->nullable();
            $table->integer('t1SurfC1')->nullable();
            $table->integer('t2SurfC1')->nullable();
            $table->integer('t3SurfC1')->nullable();
            $table->integer('statSurfC1')->nullable();
            $table->integer('covSurfB1')->nullable();
            $table->integer('t1SurfB1')->nullable();
            $table->integer('t2SurfB1')->nullable();
            $table->integer('t3SurfB1')->nullable();
            $table->integer('statSurfB1')->nullable();

            $table->integer('covTrimC1')->nullable();
            $table->integer('t1TrimC1')->nullable();
            $table->integer('t2TrimC1')->nullable();
            $table->integer('t3TrimC1')->nullable();
            $table->integer('statTrimC1')->nullable();
            $table->integer('covTrimB1')->nullable();
            $table->integer('t1TrimB1')->nullable();
            $table->integer('t2TrimB1')->nullable();
            $table->integer('t3TrimB1')->nullable();
            $table->integer('statTrimB1')->nullable();

            $table->integer('covDieC1')->nullable();
            $table->integer('t1DieC1')->nullable();
            $table->integer('t2DieC1')->nullable();
            $table->integer('t3DieC1')->nullable();
            $table->integer('statDieC1')->nullable();
            $table->integer('covDieB1')->nullable();
            $table->integer('t1DieB1')->nullable();
            $table->integer('t2DieB1')->nullable();
            $table->integer('t3DieB1')->nullable();
            $table->integer('statDieB1')->nullable();

            $table->integer('covStripC1')->nullable();
            $table->integer('t1StripC1')->nullable();
            $table->integer('t2StripC1')->nullable();
            $table->integer('t3stripC1')->nullable();
            $table->integer('statStripC1')->nullable();
            $table->integer('covStripB1')->nullable();
            $table->integer('t1StripB1')->nullable();
            $table->integer('t2StripB1')->nullable();
            $table->integer('t3stripB1')->nullable();
            $table->integer('statStripB1')->nullable();

            $table->integer('covFoldC1')->nullable();
            $table->integer('t1FoldC1')->nullable();
            $table->integer('t2FoldC1')->nullable();
            $table->integer('t3FoldC1')->nullable();
            $table->integer('statFoldC1')->nullable();
            $table->integer('covFoldB1')->nullable();
            $table->integer('t1FoldB1')->nullable();
            $table->integer('t2FoldB1')->nullable();
            $table->integer('t3FoldB1')->nullable();
            $table->integer('statFoldB1')->nullable();

            $table->integer('covSewC1')->nullable();
            $table->integer('t1SewC1')->nullable();
            $table->integer('t2SewC1')->nullable();
            $table->integer('t3SewC1')->nullable();
            $table->integer('statSewC1')->nullable();
            $table->integer('covSewB1')->nullable();
            $table->integer('t1SewB1')->nullable();
            $table->integer('t2SewB1')->nullable();
            $table->integer('t3SewB1')->nullable();
            $table->integer('statSewB1')->nullable();

            $table->integer('covBindC1')->nullable();
            $table->integer('t1BindC1')->nullable();
            $table->integer('t2BindC1')->nullable();
            $table->integer('t3BindC1')->nullable();
            $table->integer('statBindC1')->nullable();
            $table->integer('covBindB1')->nullable();
            $table->integer('t1BindB1')->nullable();
            $table->integer('t2BindB1')->nullable();
            $table->integer('t3BindB1')->nullable();
            $table->integer('statBindB1')->nullable();

            $table->integer('cov3C1')->nullable();
            $table->integer('t13C1')->nullable();
            $table->integer('t23C1')->nullable();
            $table->integer('t33C1')->nullable();
            $table->integer('stat3C1')->nullable();
            $table->integer('cov3B1')->nullable();
            $table->integer('t13B1')->nullable();
            $table->integer('t23B1')->nullable();
            $table->integer('t33B1')->nullable();
            $table->integer('stat3B1')->nullable();

            $table->integer('covPackC')->nullable();
            $table->integer('t1PackC')->nullable();
            $table->integer('t2PackC')->nullable();
            $table->integer('t3PackC')->nullable();
            $table->integer('statPackC')->nullable();
            $table->integer('covPackB')->nullable();
            $table->integer('t1PackB')->nullable();
            $table->integer('t2PackB')->nullable();
            $table->integer('t3PackB')->nullable();
            $table->integer('statPackB')->nullable();

            $table->integer('colMakeFront')->nullable();
            $table->integer('colMakeBack')->nullable();
            $table->decimal('colWaste')->nullable();
            $table->integer('blaMake')->nullable();
            $table->decimal('blaWaste')->nullable();

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


            $table->integer('ccover')->nullable();
            $table->integer('ccoverready')->nullable();
            $table->integer('ccoverwaste')->nullable();
            $table->integer('bwcover')->nullable();
            $table->integer('bwcoverready')->nullable();
            $table->integer('bwcoverwaste')->nullable();
            $table->integer('ct1')->nullable();
            $table->integer('ct1ready')->nullable();
            $table->integer('ct1waste')->nullable();
            $table->integer('bwt1')->nullable();
            $table->integer('bwt1ready')->nullable();
            $table->integer('bwt1waste')->nullable();
            $table->integer('ct2')->nullable();
            $table->integer('ct2ready')->nullable();
            $table->integer('ct2waste')->nullable();
            $table->integer('bwt2')->nullable();
            $table->integer('bwt2ready')->nullable();
            $table->integer('bwt2waste')->nullable();
            $table->integer('ct3')->nullable();
            $table->integer('ct3ready')->nullable();
            $table->integer('ct3waste')->nullable();
            $table->integer('bwt3')->nullable();
            $table->integer('bwt3ready')->nullable();
            $table->integer('bwt3waste')->nullable();
            $table->integer('csticker')->nullable();
            $table->integer('cstickerready')->nullable();
            $table->integer('cstickerwaste')->nullable();
            $table->integer('bwsticker')->nullable();
            $table->integer('bwstickerready')->nullable();
            $table->integer('bwstickerwaste')->nullable();

            $table->integer('totalqtyc')->nullable();
            $table->integer('totalpaperc')->nullable();
            $table->integer('totalqtyb')->nullable();
            $table->integer('totalpaperb')->nullable();

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
        Schema::dropIfExists('soft_covers');
    }
}
