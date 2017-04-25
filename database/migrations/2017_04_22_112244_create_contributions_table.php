<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContributionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('contributions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('creator_id')->unsigned();
            $table->string('title');
            $table->string('description');
            $table->date('date');
            $table->time('starttime');
            $table->time('endtime');
            $table->integer('location_id')->unsigned();
            $table->integer('skillsoffered')->unsigned();
            $table->integer('numberofpersonsoffered');
            $table->boolean('cancelled')->default(0);
            $table->timestamps();
        });

        Schema::table('contributions', function($table){
            $table->foreign('creator_id')->references('id')->on('users');
            $table->foreign('skillsoffered')->references('id')->on('skills');
            $table->foreign('location_id')->references('id')->on('locations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contributions');
    }
}
