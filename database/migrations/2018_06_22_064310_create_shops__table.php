<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->increments('id');
            $table->string("shop_id");
            $table->string("name");
            $table->string("tel");
            $table->string("station");
            $table->string("url");
            $table->string("line");
            $table->string("category");
            $table->string("name_kana");
            $table->string("latitude");
            $table->string("longitude");
            $table->string("opentime");
            $table->string("image");
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
        Schema::dropIfExists('shops');
    }
}
