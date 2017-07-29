<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cards', function (Blueprint $table) {
            //
            $table->increments('id');
            $table->string('sets');
            $table->string('setnumber');
            $table->string('name');
            $table->string('cmc')->nullable()->default(0);
            $table->string('manacost')->nullable()->default('');
            $table->string('type');
            $table->string('rarity');
            /*
             $table->string('subtypes')->nullable()->default('');
            $table->string('supertypes')->nullable()->default('');
            $table->string('layout');
            //
            $table->string('power')->nullable()->default(0);
            $table->string('toughness')->nullable()->default(0);
            $table->string('loyalty')->nullable()->default(0);
            //
            $table->longText('text')->nullable();
            $table->longText('flavor')->nullable();
            */

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
        Schema::dropIfExists('cards');
    }
}
