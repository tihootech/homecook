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
            $table->string('uid')->unique()->index();

            $table->unsignedInteger('peyk_id')->nullable();
            $table->unsignedInteger('customer_id')->nullable();
            $table->unsignedInteger('address_id')->nullable();

            $table->unsignedBigInteger('total')->default(0);
            $table->unsignedBigInteger('peyk_share')->default(0);

            $table->boolean('ponied')->default(0);
            $table->boolean('peyk_ponied')->default(0);

            $table->softDeletes();
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
