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
        Schema::create('predictions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title');
            $table->string('slug');
            $table->string('home')->nullable();
            $table->string('away')->nullable();
            $table->string('competition')->nullable();
            $table->json('odds')->nullable();
            $table->integer('prediction_id')->nullable();
            $table->string('prediction')->nullable();
            $table->timestamp('match_time')->nullable();
            $table->string('country')->nullable();
            $table->string('market')->nullable();
            $table->string('result')->nullable();
            $table->string('status')->nullable();
            $table->string('federation')->nullable();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('predictions');
    }
};
