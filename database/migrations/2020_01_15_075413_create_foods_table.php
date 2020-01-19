<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foods', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('uid');
            $table->unsignedInteger('cook_id');
            $table->string('title');
            $table->unsignedBigInteger('price');
            $table->unsignedSmallInteger('discount')->default(0);
            $table->text('material')->nullable();
            $table->text('info')->nullable();
            $table->string('image');
            $table->boolean('confirmed')->default(0);
            $table->unsignedBigInteger('seens')->default(0);
            $table->string('type')->default('food'); // food or product
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
        Schema::dropIfExists('foods');
    }
}
