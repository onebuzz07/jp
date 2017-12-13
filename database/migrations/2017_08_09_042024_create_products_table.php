<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('products', function (Blueprint $table) {

          $table->increments('id');
          $table->integer("items_id")->nullable();
          $table->string('paf_number')->nullable();
          $table->text('remarkbig')->nullable();
          $table->date('datetime')->nullable();
          $table->boolean('approval')->nullable();
          $table->boolean('material')->nullable();
          $table->boolean('data')->nullable();
          $table->boolean('artwork')->nullable();
          $table->boolean('diecut')->nullable();
          $table->boolean('attachment')->nullable();
          $table->string('revNo')->nullable();

          $table->boolean('newArtwork')->nullable();
          $table->boolean('films')->nullable();
          $table->boolean('technicalDrawing')->nullable();
          $table->boolean('digitalProofing')->nullable();
          $table->boolean('artworkDrawing')->nullable();
          $table->boolean('colorLimit')->nullable();
          $table->boolean('bluePrint')->nullable();
          $table->boolean('pmrf')->nullable();
          $table->boolean('other')->nullable();

          $table->string('other_text')->nullable();
          $table->boolean('yes')->nullable();
          $table->boolean('no')->nullable();

          $table->boolean('customer')->nullable();
          $table->string('customer_text')->nullable();
          $table->boolean('qa')->nullable();
          $table->string('qa_text')->nullable();
          $table->boolean('production')->nullable();
          $table->string('production_text')->nullable();
          $table->date('requiredDate')->nullable();
          $table->boolean('productionProcess')->nullable();
          $table->boolean('handCutSubmission')->nullable();

          $table->boolean('yes1')->nullable();
          $table->boolean('no1')->nullable();

          $table->boolean('wip')->nullable();
          $table->boolean('fg')->nullable();
          $table->boolean('disposeBalance')->nullable();
          $table->boolean('rcp')->nullable();
          $table->boolean('cutoff')->nullable();
          $table->boolean('kiv')->nullable();

          $table->string('qtyOnHand')->nullable();
          $table->string('workOrderID')->nullable();
          $table->boolean('notAvailable1')->nullable();
          $table->boolean('dispose1')->nullable();

          $table->string('ctpPlate_text')->nullable();
          $table->boolean('notAvailable2')->nullable();
          $table->boolean('dispose2')->nullable();
          $table->string('film_text')->nullable();
          $table->string('adviseBy')->nullable();
          $table->string('issueBy')->nullable();
          $table->string('status')->nullable();
          $table->string('rev')->nullable();
          $table->string('sco_number')->nullable();

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
        Schema::dropIfExists('products');
    }
}
