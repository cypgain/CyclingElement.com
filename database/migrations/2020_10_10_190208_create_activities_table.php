<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivitiesTable extends Migration
{

    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->unsignedBigInteger('id');
            $table->unsignedBigInteger('strava_id');
            $table->unsignedInteger('user_id');
            $table->string('name');
            $table->string('type');
            $table->float('distance')->default(0);
            $table->integer('moving_time')->default(0);
            $table->integer('elapsed_time')->default(0);
            $table->float('elevation')->default(0);
            $table->dateTime('start_date');
            $table->float('average_speed')->default(0);
            $table->float('max_speed')->default(0);
            $table->float('average_watts')->default(0);
            $table->integer('max_watts')->default(0);
            $table->float('calories')->default(0);
            $table->float('average_cadence')->default(0);
            $table->float('average_heartrate')->default(0);
            $table->float('max_heartrate')->default(0);

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->primary(['id','strava_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('activities');
    }

}
