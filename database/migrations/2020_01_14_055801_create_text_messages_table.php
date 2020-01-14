<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTextMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('text_messages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('template');
            $table->string('receptor');
            $table->string('sender')->nullable();
            $table->string('cost')->nullable();
            $table->string('status')->nullable();
            $table->string('body')->nullable();
            $table->text('tokens'); // &&& seperated
            $table->boolean('sent')->default(0);
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
        Schema::dropIfExists('text_messages');
    }
}
