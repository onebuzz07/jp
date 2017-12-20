<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSoftCoverBws extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('softcoverbws', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("user")->nullable();
            $table->decimal('half')->nullable();
            $table->integer("sales_id")->nullable();
            $table->decimal('none1')->nullable();
            $table->decimal('none2')->nullable();
            $table->integer('covOrderB')->nullable();
            $table->integer('t1OrderB')->nullable();
            $table->integer('t2OrderB')->nullable();
            $table->integer('t3OrderB')->nullable();
            $table->integer('statOrderB')->nullable();

            $table->integer('covUpB')->nullable();
            $table->integer('t1UpB')->nullable();
            $table->integer('t2UpB')->nullable();
            $table->integer('t3UpB')->nullable();
            $table->integer('statUpB')->nullable();

            $table->integer('covSignB')->nullable();
            $table->integer('t1signB')->nullable();
            $table->integer('t2signB')->nullable();
            $table->integer('t3signB')->nullable();
            $table->integer('statSignB')->nullable();

            $table->integer('covFrontB')->nullable();
            $table->integer('t1FrontB')->nullable();
            $table->integer('t2FrontB')->nullable();
            $table->integer('t3FrontB')->nullable();
            $table->integer('statFrontB')->nullable();

            $table->integer('covBackB')->nullable();
            $table->integer('t1BackB')->nullable();
            $table->integer('t2BackB')->nullable();
            $table->integer('t3BackB')->nullable();
            $table->integer('statBackB')->nullable();

            $table->integer('covSurfB')->nullable();
            $table->integer('t1SurfB')->nullable();
            $table->integer('t2SurfB')->nullable();
            $table->integer('t3SurfB')->nullable();
            $table->integer('statSurfB')->nullable();

            $table->integer('covTrimB')->nullable();
            $table->integer('t1TrimB')->nullable();
            $table->integer('t2TrimB')->nullable();
            $table->integer('t3TrimB')->nullable();
            $table->integer('statTrimB')->nullable();

            $table->integer('covDieB')->nullable();
            $table->integer('t1DieB')->nullable();
            $table->integer('t2DieB')->nullable();
            $table->integer('t3DieB')->nullable();
            $table->integer('statDieB')->nullable();

            $table->integer('covStripB')->nullable();
            $table->integer('t1StripB')->nullable();
            $table->integer('t2StripB')->nullable();
            $table->integer('t3stripB')->nullable();
            $table->integer('statStripB')->nullable();

            $table->integer('covFoldB')->nullable();
            $table->integer('t1FoldB')->nullable();
            $table->integer('t2FoldB')->nullable();
            $table->integer('t3FoldB')->nullable();
            $table->integer('statFoldB')->nullable();

            $table->integer('covSewB')->nullable();
            $table->integer('t1SewB')->nullable();
            $table->integer('t2SewB')->nullable();
            $table->integer('t3SewB')->nullable();
            $table->integer('statSewB')->nullable();

            $table->integer('covBindB')->nullable();
            $table->integer('t1BindB')->nullable();
            $table->integer('t2BindB')->nullable();
            $table->integer('t3BindB')->nullable();
            $table->integer('statBindB')->nullable();

            $table->integer('cov3B')->nullable();
            $table->integer('t13B')->nullable();
            $table->integer('t23B')->nullable();
            $table->integer('t33B')->nullable();
            $table->integer('stat3B')->nullable();

            $table->integer('covPrintB')->nullable();
            $table->integer('t1PrintB')->nullable();
            $table->integer('t2PrintB')->nullable();
            $table->integer('t3PrintB')->nullable();
            $table->integer('statPrintB')->nullable();

            $table->integer('covSurfB1')->nullable();
            $table->integer('t1SurfB1')->nullable();
            $table->integer('t2SurfB1')->nullable();
            $table->integer('t3SurfB1')->nullable();
            $table->integer('statSurfB1')->nullable();

            $table->integer('covTrimB1')->nullable();
            $table->integer('t1TrimB1')->nullable();
            $table->integer('t2TrimB1')->nullable();
            $table->integer('t3TrimB1')->nullable();
            $table->integer('statTrimB1')->nullable();

            $table->integer('covDieB1')->nullable();
            $table->integer('t1DieB1')->nullable();
            $table->integer('t2DieB1')->nullable();
            $table->integer('t3DieB1')->nullable();
            $table->integer('statDieB1')->nullable();

            $table->integer('covStripB1')->nullable();
            $table->integer('t1StripB1')->nullable();
            $table->integer('t2StripB1')->nullable();
            $table->integer('t3stripB1')->nullable();
            $table->integer('statStripB1')->nullable();

            $table->integer('covFoldB1')->nullable();
            $table->integer('t1FoldB1')->nullable();
            $table->integer('t2FoldB1')->nullable();
            $table->integer('t3FoldB1')->nullable();
            $table->integer('statFoldB1')->nullable();

            $table->integer('covSewB1')->nullable();
            $table->integer('t1SewB1')->nullable();
            $table->integer('t2SewB1')->nullable();
            $table->integer('t3SewB1')->nullable();
            $table->integer('statSewB1')->nullable();

            $table->integer('covBindB1')->nullable();
            $table->integer('t1BindB1')->nullable();
            $table->integer('t2BindB1')->nullable();
            $table->integer('t3BindB1')->nullable();
            $table->integer('statBindB1')->nullable();

            $table->integer('cov3B1')->nullable();
            $table->integer('t13B1')->nullable();
            $table->integer('t23B1')->nullable();
            $table->integer('t33B1')->nullable();
            $table->integer('stat3B1')->nullable();

            $table->integer('covPackB')->nullable();
            $table->integer('t1PackB')->nullable();
            $table->integer('t2PackB')->nullable();
            $table->integer('t3PackB')->nullable();
            $table->integer('statPackB')->nullable();

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

            $table->integer('bwcover')->nullable();
            $table->integer('bwcoverready')->nullable();
            $table->integer('bwcoverwaste')->nullable();

            $table->integer('bwt1')->nullable();
            $table->integer('bwt1ready')->nullable();
            $table->integer('bwt1waste')->nullable();

            $table->integer('bwt2')->nullable();
            $table->integer('bwt2ready')->nullable();
            $table->integer('bwt2waste')->nullable();

            $table->integer('bwt3')->nullable();
            $table->integer('bwt3ready')->nullable();
            $table->integer('bwt3waste')->nullable();

            $table->integer('bwsticker')->nullable();
            $table->integer('bwstickerready')->nullable();
            $table->integer('bwstickerwaste')->nullable();

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
        Schema::dropIfExists('softcoverbws');
    }
}
