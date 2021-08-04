<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThreadSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thread_subscriptions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId("user_id")->constrained("users")->onUpdate('cascade')->onDelete("cascade");
            $table->foreignId("thread_id")->constrained("threads")->onUpdate('cascade')->onDelete("cascade");
            $table->unique(["user_id", "thread_id"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('thread_subscriptions');
    }
}
