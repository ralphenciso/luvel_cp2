<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Storage;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {



        Schema::create('vehicles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('make');
            $table->string('model');
            $table->string('type'); //car, yacht, jet
            $table->string('mode');
            $table->decimal('price',10,0);
            $table->text('description')->nullable();
            $table->string('thumbnail')->default('/images/noimage.svg');
            $table->string('img_urls')->nullable(); //folder loc
        });





    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicles');
    }
}
