<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrandsColorsEnginesModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brands_colors_engines_models', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('price',15,3)->unsigned();
            $table->string('photo',255)->nullable();
            $table->integer('brand_id')->unsigned();
            $table->integer('model_id')->unsigned();
            $table->integer('engine_id')->unsigned();
            $table->integer('color_id')->unsigned();
            $table->foreign('brand_id')->references('id')->on('brands');
            $table->foreign('model_id')->references('id')->on('models');
            $table->foreign('color_id')->references('id')->on('colors');
            $table->foreign('engine_id')->references('id')->on('engines');
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
        Schema::dropIfExists('vehicles');
    }
}
