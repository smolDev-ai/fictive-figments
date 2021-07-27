<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserWarningsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_warnings', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId("warned_user")->constrained("users")->onUpdate("cascade")->onDelete("cascade");
            $table->foreignId("issued_by")->constrained("users")->onUpdate("cascade")->onDelete("cascade");
            $table->mediumText("warning_notes");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_warnings');
    }
}
