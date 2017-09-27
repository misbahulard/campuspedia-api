<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table){
            $table->foreign('role_id')->references('role_id')->on('roles');
        });

        Schema::table('events', function (Blueprint $table){
            $table->foreign('category_id')->references('category_id')->on('event_categories');
            $table->foreign('event_location_id')->references('event_location_id')->on('event_locations');
            $table->foreign('campus_id')->references('campus_id')->on('campuses');
        });

        Schema::table('reminders', function (Blueprint $table){
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->foreign('event_id')->references('event_id')->on('events');
        });

        Schema::table('campuses', function (Blueprint $table){
            $table->foreign('campus_location_id')->references('campus_location_id')->on('campus_locations');
        });

        Schema::table('event_categories', function (Blueprint $table){
            $table->foreign('category_sub_id')->references('category_sub_id')->on('event_sub_categories');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
