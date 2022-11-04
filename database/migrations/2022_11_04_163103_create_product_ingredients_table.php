<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductIngredientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_ingredients', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('product_id');
            $table->string('weight', 2)->default('kg');
            $table->double('consumes')->nullable()->default(0);
            $table->double('main_stock')->nullable()->default(0);
            $table->double('current_stock')->nullable()->default(0);
            $table->Integer('alert_percentage_rate')->default(50);
            $table->tinyInteger('alert_email')->default(0);
            $table->timestamps();
            $table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_ingredients');
    }
}
