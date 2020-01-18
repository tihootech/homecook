<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('peyk_share')->default(5000);
            $table->unsignedInteger('cook_share')->default(100);
            $table->unsignedSmallInteger('tax')->default(9);
            $table->unsignedSmallInteger('added_price')->default(5);
            $table->timestamps();
        });

        \App\Setting::create(['id'=>1]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
