<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('highlights', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->string('slug');
            $table->string('competition');
            $table->mediumText('match_url')->nullable();
            $table->mediumText('competition_url')->nullable();
            $table->string('thumbnail')->nullable();
            $table->timestamp('match_date')->nullable();
            $table->string('video_id')->nullable();
            $table->string('video_title')->nullable();
            $table->text('video_embed')->nullable();
            $table->integer('index_status');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('highlights');
    }
};
