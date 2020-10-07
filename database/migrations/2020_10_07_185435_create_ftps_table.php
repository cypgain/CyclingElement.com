<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFtpsTable extends Migration
{

    public function up()
    {
        Schema::create('ftps', function (Blueprint $table) {
            $table->unsignedInteger('user_id');
            $table->dateTime('created_at');
            $table->integer('ftp');

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->primary(['user_id', 'created_at']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('ftps');
    }

}
