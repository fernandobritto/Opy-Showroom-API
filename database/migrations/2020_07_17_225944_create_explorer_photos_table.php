<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExplorerPhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('explorer_photos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('explorer_id');
            $table->string('photo');
            $table->boolean('is_thumb');
            $table->timestamps();

            $table->foreign('explorer_id')->references('id')->on('explorers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('explorer_photos');
    }
}
