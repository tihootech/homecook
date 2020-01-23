<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebsitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('websites', function (Blueprint $table) {

            $table->bigIncrements('id');

            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('email')->nullable();

            $table->string('instagram')->nullable();
            $table->string('telegram')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('linkedin')->nullable();

            $table->text('about')->nullable();
            $table->text('order_food')->nullable();
            $table->text('order_product')->nullable();
            $table->text('blogs')->nullable();

            $table->text('cols')->nullable();

            $table->string('about_image')->nullable();
            $table->string('statics_image')->nullable();
            $table->string('testimonial_image')->nullable();

            $table->timestamps();

        });

        \App\Website::create([
            'cols' => 'touch_app&&به راحتی سفارش دهید&&توضیحات این مورد اینجا قرار گرفته میشود توضیحات این مورد اینجا قرار گرفته میشود توضیحات این مورد اینجا قرار گرفته میشود توضیحات این مورد اینجا قرار گرفته میشود&&&motorcycle&&به راحتی سفارش دهید&&توضیحات این مورد اینجا قرار گرفته میشود توضیحات این مورد اینجا قرار گرفته میشود توضیحات این مورد اینجا قرار گرفته میشود توضیحات این مورد اینجا قرار گرفته میشود&&&eco&&به راحتی سفارش دهید&&توضیحات این مورد اینجا قرار گرفته میشود توضیحات این مورد اینجا قرار گرفته میشود توضیحات این مورد اینجا قرار گرفته میشود توضیحات این مورد اینجا قرار گرفته میشود'
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('websites');
    }
}
