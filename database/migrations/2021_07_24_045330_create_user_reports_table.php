<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_reports', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId("reporting_user")->constrained("users")->onUpdate("cascade")->onDelete("cascade");
            $table->foreignId("reported_user")->constrained("users")->onUpdate("cascade")->onDelete("cascade");
            $table->mediumText('reported_content');
            $table->mediumText("report_comments")->nullable(true);
            $table->boolean("resolved")->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_reports');
    }
}
