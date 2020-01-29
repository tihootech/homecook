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

            $table->unsignedBigInteger('cost');
            $table->unsignedSmallInteger('count');
            $table->unsignedBigInteger('payable');

            $table->unsignedBigInteger('master_share');
            $table->unsignedBigInteger('tax');
            $table->unsignedBigInteger('cook_share');

            $table->boolean('ponied')->default(0);
            $table->boolean('cook_ponied')->default(0);

            $table->boolean('delivered')->default(0);

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
