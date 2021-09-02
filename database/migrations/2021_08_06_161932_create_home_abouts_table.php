<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeAboutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_abouts', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();;
            $table->text('sort_description')->nullable();;
            $table->text('long_description')->nullable();;
            $table->string('sub_description')->nullable();
            $table->text('long_description_sec')->nullable();
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
        Schema::dropIfExists('home_abouts');
    }
}
