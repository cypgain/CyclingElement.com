<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersStravaTokensTable extends Migration
{

    public function up()
    {
        Schema::create('users_strava_tokens', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id');
            $table->unsignedBigInteger('strava_id');
            $table->string('access_token');
            $table->string('refresh_token');
            $table->dateTime('expires_at');

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('users_strava_tokens');
    }

}
