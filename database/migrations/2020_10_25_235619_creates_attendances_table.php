<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatesAttendancesTable extends Migration
{
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table){
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('event_id');
            $table->integer('percentage');

            $table->foreign('user_id')
                ->references('id')
                ->on('users');
            $table->foreign('event_id')
                ->references('id')
                ->on('users');
            $table->unique(['user_id', 'event_id']);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::table('attendances', function (Blueprint $table){
            $table->dropIfExists();
        });
    }
}
