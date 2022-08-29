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
        Schema::create('leagues', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger('country_id')->unsigned()->index();
            $table->integer('league_id');
            $table->string('name');
            $table->string('slug');
            $table->string('type')->nullable();
            $table->string('logo')->nullable();
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
        Schema::dropIfExists('leagues');
    }
};
