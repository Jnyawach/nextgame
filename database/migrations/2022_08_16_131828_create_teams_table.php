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
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger('country_id')->unsigned()->index();
            $table->integer('team_id');
            $table->integer('founded')->nullable();
            $table->string('name');
            $table->string('slug');
            $table->string('code')->nullable();
            $table->string('logo')->nullable();
            $table->integer('venue_id')->nullable();
            $table->string('venue_name')->nullable();
            $table->string('venue_address')->nullable();
            $table->integer('venue_capacity')->nullable();
            $table->string('venue_surface')->nullable();
            $table->string('venue_image')->nullable();
            $table->foreign('country_id')->references('id')
                ->on('competition-countries')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teams');
    }
};
