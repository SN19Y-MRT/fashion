<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
       {
           Schema::create('images', function (Blueprint $table) {
               $table->bigIncrements('id');
               $table->unsignedBigInteger('me_id');
               $table->string('src');
               $table->timestamps();
    
               $table->foreign('me_id')->references('id')->on('mes')->onDelete('cascade');
           });
       }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('images');
    }
}
