<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePMPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pm_posts', function (Blueprint $table) {
            $table->id();
            $table->timestamp("posted_on");
            $table->mediumText("content");
            $table->foreignId("pm_id")->constrained("private_messages")->onUpdate("cascade")->onDelete("cascade");
            $table->foreignId("author")->constrained("users")->onUpdate("cascade")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('p_m-_posts');
    }
}
