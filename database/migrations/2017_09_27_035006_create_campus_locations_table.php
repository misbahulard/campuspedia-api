<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampusLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campus_locations', function (Blueprint $table) {
            $table->increments('campus_location_id');
            $table->string('street_address');
            $table->integer('postal_code');
            $table->string('city');
            $table->string('state_province');
            $table->decimal('latitude', 10, 6);
            $table->decimal('longtitude', 10, 6);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('campus_locations');
    }
}
