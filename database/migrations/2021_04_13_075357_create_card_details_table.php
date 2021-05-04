<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCardDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('card_details', function (Blueprint $table) {
            $table->id();
            $table->string('person_name')->nullable();
            $table->string('designation')->nullable();
            $table->string('business_name')->nullable();
            $table->string('short_description')->nullable();
            $table->string('image')->nullable();
            $table->string('whatsapp_number')->nullable();
            $table->string('contacts')->nullable();
            $table->string('single_address')->nullable();
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
        Schema::dropIfExists('card_details');
    }
}
