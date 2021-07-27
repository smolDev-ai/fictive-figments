<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forums', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("name")->unique();
            $table->text("description");
            $table->foreignId("category_id")->constrained("categories")->onUpdate("cascade")->onDelete("cascade");
            $table->bigInteger("parent_forum")->nullable()->unsigned();
            $table->foreign("parent_forum")->references("id")->on("forums")->onUpdate("cascade")->onDelete("cascade");
            $table->boolean("is_subForum")->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('forums');
    }
}
