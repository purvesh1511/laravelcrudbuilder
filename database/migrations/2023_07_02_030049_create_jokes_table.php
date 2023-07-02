<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJokesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jokes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('joke_story')->nullable();
            $table->longText('joke_story_hindi')->nullable();
            $table->string('joke_story_url')->nullable();
            $table->unsignedBigInteger('joke_category_id')->nullable();
            $table->foreign('joke_category_id')->references('id')->on('jokecategories')->onDelete('cascade');
            $table->string('status')->default(0)->nullable()->comment("1 = active and 0 = unactive");
            $table->string('is_publish')->default(0)->nullable()->comment("1 = publish and 0 = unpublish");
            $table->string('type')->default(0)->comment("1 = quote and 0 = joke")->nullable();
            $table->string('tag')->nullable();
            $table->string('author')->nullable();
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
        Schema::dropIfExists('jokes');
    }
}
