<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('mercado_livre_id')->nullable();
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->enum('listing_type_id', ['bronze', 'gold', 'gold_special', 'gold_pro']);
            $table->string('pictures');
            $table->string('category_id');
            
            $table->integer('initial_quantity')->default(1);
            $table->integer('available_quantity');
            $table->integer('sold_quantity')->default(0);
            
            //item default value...
            $table->string('buying_mode')->default('buy_it_now');
            $table->string('currency_id')->default('BRL');
            $table->string('condition')->default('new');
            $table->string('site_id')->default('MLB');
            $table->float('price');
            
            $table->text('descriptions')->nullable();

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
