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
            $table->integer('category_id');
            $table->text('name');
            $table->string('slug')->unique();
            $table->string('picture')->nullable();
            $table->integer('amount')->default(0);
            $table->integer('unit_price')->default(0);
            $table->string('order')->default(0);
            $table->boolean('is_home')->default(0)->comment('0=Not display in home page, 1=display in home page');
            $table->boolean('status')->default(0)->comment('0=Unpublic, 1=Public');
            $table->longText('description')->nullable(); 
            $table->timestamps();
            $table->softDeletes();
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
