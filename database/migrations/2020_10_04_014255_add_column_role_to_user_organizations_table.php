<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnRoleToUserOrganizationsTable extends Migration
{
    public function up()
    {
        Schema::table('user_organizations', function (Blueprint $table) {
            $table->string('role')->default('owner');
            // nullable because a user can register without a organization
            $table->unsignedInteger('organization_id')->nullable()->change();
            $table->unique(['user_id', 'organization_id', 'role']);
        });
    }

    public function down()
    {
        Schema::table('user_organizations', function (Blueprint $table) {
            $table->dropUnique(['user_id', 'organization_id', 'role']);
            $table->dropColumn('role');
        });
    }
}
