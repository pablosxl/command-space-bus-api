<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMissionHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mission_histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('origin');
            $table->string('situation');
            $table->string('command');
            $table->integer('memberId');
            $table->unsignedBigInteger('missionId');
            $table->timestamps();
        });


        Schema::table('mission_histories', function (Blueprint $table) {
            $table->foreign('missionId')->references('id')->on('missions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mission_histories');
    }
}
