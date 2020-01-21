<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('transaction_id');
            $table->unsignedInteger('food_id');
            $table->unsignedInteger('cook_id');
            $table->unsignedBigInteger('payable');
            $table->unsignedBigInteger('tax');
            $table->unsignedBigInteger('added_price');
            $table->unsignedBigInteger('cook_cut');
            $table->unsignedSmallInteger('count');
            $table->unsignedBigInteger('total_payable');
            $table->boolean('ponied')->default(0);
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
        Schema::dropIfExists('transaction_items');
    }
}
