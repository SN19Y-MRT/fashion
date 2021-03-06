<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFashionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('fashions', function (Blueprint $table) {
            $table->increments('id');
            $table->char('fashionName', 100);
            $table->string('fashionOverview',500);
            $table->string('syuunou',500);
            $table->integer('category_id')->unsigned();
            $table->string('image_path')->nullable();
            $table->timestamps();
            $table->softDeletes();
            
            
  
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fashions');
    }
}
