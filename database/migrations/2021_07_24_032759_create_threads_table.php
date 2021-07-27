<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThreadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('threads', function (Blueprint $table) {
            $table->id();
            $table->timestamp("created_on");
            $table->string("title")->unique();
            $table->mediumText("body");
            $table->foreignId("author")->constrained("users")->onUpdate("cascade")->onDelete("cascade");
            $table->foreignId("forum")->constrained("forums")->onUpdate("cascade")->onDelete("cascade");
            $table->boolean("is_locked")->default(false);
            $table->boolean("is_sticky")->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('threads');
    }
}
