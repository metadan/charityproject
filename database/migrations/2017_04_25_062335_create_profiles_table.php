<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username');
            $table->string('description');
            $table->integer('user_id')->unsigned();
            $table->integer('skills')->unsigned();
            $table->integer('location')->unsigned();
            $table->boolean('visibletoothers')->default(1);
            $table->boolean('cancelled')->default(0);
            $table->timestamps();
        });

        Schema::table('profiles', function($table){
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('skills')->references('id')->on('skills');
            $table->foreign('location')->references('id')->on('locations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
