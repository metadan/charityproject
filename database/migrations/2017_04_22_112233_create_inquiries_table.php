<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInquiriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('inquiries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('creator_id')->unsigned();
            $table->string('title');
            $table->string('description');
            $table->date('date');
            $table->time('starttime');
            $table->time('endtime');
            $table->integer('location_id')->unsigned();
            $table->integer('skillsneeded')->unsigned();
            $table->integer('numberofpersonsneeded');
            $table->boolean('cancelled')->default(0);
            $table->timestamps();
        });

        Schema::table('inquiries', function($table){
            $table->foreign('creator_id')->references('id')->on('users');
            $table->foreign('skillsneeded')->references('id')->on('skills');
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
        Schema::dropIfExists('inquiries');
    }
}
