<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("name");
            $table->boolean("makeCategories")->default(false);
            $table->boolean("makeForums")->default(false);
            $table->boolean("makeThreads")->default(true);
            $table->boolean("makePosts")->default(true);
            $table->boolean("makeSubForums")->default(false);
            $table->boolean("makeRoles")->default(false);
            $table->boolean("deleteSubForums")->default(false);
            $table->boolean("deletePosts")->default(false);
            $table->boolean("deleteThreads")->default(false);
            $table->boolean("deleteForums")->default(false);
            $table->boolean("deleteCategories")->default(false);
            $table->boolean("editRoles")->default(false);
            $table->boolean("deleteRoles")->default(false);
            $table->boolean("editUserRoles")->default(false);
            $table->boolean("canBanUser")->default(false);
            $table->boolean("canWarnUser")->default(false);
            $table->boolean("canReport")->default(true);
            $table->boolean("isBannable")->default(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
