<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bar', function (Blueprint $table) {
            $table->id();   
            $table->string('name');         
            $table->integer('type');
            $table->decimal('measurement');
            $table->unsignedBigInteger('safe_id');
            $table->unsignedBigInteger('weight_id');
            $table->foreign('safe_id')->references('id')->on('safe');
            $table->foreign('weight_id')->references('id')->on('weight');
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
        Schema::dropIfExists('bar');
    }
}
