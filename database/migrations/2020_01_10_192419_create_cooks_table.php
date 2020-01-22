<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cooks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('uid')->unique();
            $table->unsignedInteger('user_id')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('telephone')->nullable();
            $table->string('mobile')->unique();
            $table->string('state');
            $table->string('city');
            $table->string('hood');
            $table->text('address');
            $table->text('modify_reason')->nullable();
            $table->boolean('active')->default(0);
            $table->boolean('fresh')->default(1);
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
        Schema::dropIfExists('cooks');
    }
}
