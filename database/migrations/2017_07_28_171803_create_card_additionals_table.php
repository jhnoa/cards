<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCardAdditionalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('card_additionals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sets');
            $table->string('setnumber');
            $table->string('subtypes')->nullable()->default('');
            $table->string('supertypes')->nullable()->default('');
            $table->string('layout');
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
        Schema::dropIfExists('card_additionals');
    }
}
