<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtworksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artworks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('artist');
            $table->string('subject');
            $table->string('country');
            $table->string('category');
            $table->string('style');
            $table->string('medium');
            $table->string('material');
            $table->string('size')->nullable();
            $table->string('height');
            $table->string('width');
            $table->string('depth')->nullable();
            $table->string('price');
            $table->longText('description')->nullable();
            $table->string('attachment');
            $table->softDeletes();
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
        Schema::dropIfExists('artworks');
    }
}
