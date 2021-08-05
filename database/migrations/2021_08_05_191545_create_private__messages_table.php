<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrivateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('private__messages', function (Blueprint $table) {
            $table->id();
            $table->foreignId("creator")->constrained("users")->onUpdate("cascade")->onDelete("cascade");
            $table->string("title");
            $table->mediumText("body");
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
        Schema::dropIfExists('private__messages');
    }
}
