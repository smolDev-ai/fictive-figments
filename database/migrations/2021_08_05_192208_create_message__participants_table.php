<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessageParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('message__participants', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->uuid("pm_id");
            $table->foreign('pm_id')->references('id')->on("private__messages")->onUpdate("cascade")->onDelete("cascade");
            $table->foreignId("participant_id")->constrained("users")->onUpdate("cascade")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('message__participants');
    }
}
