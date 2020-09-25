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
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->uuid('uuid');
            $table->string('name');
            $table->string('subject');
            $table->string('city');
            $table->string('category');
            $table->string('style');
            $table->string('medium');
            $table->string('material');
            $table->string('size')->nullable();
            $table->string('height');
            $table->string('width');
            $table->string('depth')->nullable();
            $table->string('price');
            $table->longText('description');
            $table->string('attachment')->nullable();
            $table->string('status');
            $table->string('remarks')->nullable();
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
