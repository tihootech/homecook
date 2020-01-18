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
            $table->morphs('owner'); // is it for product or food?
            $table->unsignedBigInteger('first_price'); // the price in food column
            $table->unsignedBigInteger('tax'); // + n% of first_price (n=9)
            $table->unsignedBigInteger('added_price');  // + n% of first_price (n=5)
            $table->unsignedBigInteger('payable'); // - discount
            $table->unsignedSmallInteger('count');
            $table->unsignedBigInteger('total'); // count * payable
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
