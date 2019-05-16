<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('page_id')->default(0);
            $table->text('title');
            $table->string('slug')->unique();
            $table->string('picture')->nullable();
            $table->string('url')->nullable();
            $table->string('order')->default(0);
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
        Schema::dropIfExists('pages');
    }
}
