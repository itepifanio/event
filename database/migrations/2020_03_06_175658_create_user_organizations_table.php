<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserOrganizationsTable extends Migration
{
    public function up()
    {
        Schema::create('user_organizations', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('organization_id');
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users');

            $table->foreign('organization_id')
                ->references('id')
                ->on('organizations');
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_organizations');
    }
}
