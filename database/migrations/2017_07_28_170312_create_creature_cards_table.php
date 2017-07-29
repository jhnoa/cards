<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCreatureCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('creature_cards', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sets');
            $table->string('setnumber');
            $table->string('power')->nullable()->default(0);
            $table->string('toughness')->nullable()->default(0);
            $table->string('loyalty')->nullable()->default(0);
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
        Schema::dropIfExists('creature_cards');
    }
}
