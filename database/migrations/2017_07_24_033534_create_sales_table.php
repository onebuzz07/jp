<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("items_id")->nullable();
            $table->integer("workorders_id")->nullable();
            $table->string('sco_number')->nullable();
            $table->string('salesline')->nullable();
            $table->string('salesorder')->nullable();
            $table->string('workorder')->nullable();
            $table->string('wid')->nullable();
            $table->string('line')->nullable();
            $table->date('datetime')->nullable();
            $table->string('custName')->nullable();
            $table->string('purchaseOrder')->nullable();
            $table->boolean('approval')->nullable();
            $table->date('deliverDate')->nullable();

            $table->string('lot')->nullable();
            $table->string('mfgDate')->nullable();
            $table->string('expiryDate')->nullable();
            $table->string('dateFacNo')->nullable();
            $table->string('packerID')->nullable();
            $table->string('batchbar')->nullable();
            $table->boolean('lotcheck')->nullable();
            $table->boolean('mfgcheck')->nullable();
            $table->boolean('expcheck')->nullable();
            $table->boolean('datecheck')->nullable();
            $table->boolean('packcheck')->nullable();
            $table->boolean('rawcheck')->nullable();
            $table->boolean('batchcheck')->nullable();

            $table->longtext('remark')->nullable();
            $table->longtext('remark2')->nullable();
            $table->longtext('remark3')->nullable();
            $table->longtext('remark4')->nullable();
            $table->string('status')->nullable();

            $table->string('confirmBy')->nullable();
            $table->string('confirmBy2')->nullable();
            $table->string('confirmBy3')->nullable();
            $table->string('confirmBy4')->nullable();
            
            $table->string('repeat_from')->nullable();
            $table->string('repeat')->nullable();
            $table->string('paf_number')->nullable();
            $table->string('prodremark')->nullable();


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
        Schema::dropIfExists('sales');
    }
}
