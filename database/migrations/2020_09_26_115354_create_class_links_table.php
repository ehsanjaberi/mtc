<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_links', function (Blueprint $table) {
            $table->char('ERCode',20)->primary();
            $table->char('LessonCode',20);
            $table->string('LessonTitle',150);
            $table->string('DayOfWeek',10)->nullable();
            $table->char('StartTime',8)->nullable();
            $table->char('EndTime',8)->nullable();
            $table->char('TeacherName',60)->nullable();
            $table->string('ClassLink')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('class_links');
    }
}
