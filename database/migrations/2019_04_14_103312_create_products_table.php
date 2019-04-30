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
            $table->bigIncrements('id');
            $table->string('product_name');
            $table->unsignedInteger('barcode');
            $table->unsignedInteger('category_id');
            $table->float('selling_price_per_unit');
            $table->float('buying_price_per_unit');
            $table->float('quantity');
            $table->float('tax')->default(0);
            $table->string('unit');
            $table->timestamps();
        });
    }

//    ppu -> price per unit

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
