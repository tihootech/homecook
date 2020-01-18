<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('uid');
            $table->unsignedInteger('peyk_id')->nullable();
            $table->unsignedInteger('customer_id')->nullable();
            $table->unsignedInteger('cook_id')->nullable();
            $table->unsignedBigInteger('amount')->nullable();
            $table->unsignedBigInteger('peyk_share')->nullable();
            $table->unsignedBigInteger('cook_share')->nullable();
            $table->unsignedBigInteger('master_share')->nullable();
            $table->text('address')->nullable();
            $table->boolean('open')->default(1);
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
        Schema::dropIfExists('transactions');
    }
}
