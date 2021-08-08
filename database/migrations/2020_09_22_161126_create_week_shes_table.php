<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeekShesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('week_shes', function (Blueprint $table) {
            $table->id();
            $table->string('title')->comment('عنوان');
            $table->string('attachment')->comment('آدرس فایل');
            $table->char('M')->comment('مقطع تحصیلی');
            $table->char('status')->comment('وضعیت(برنامه هفتگی،چارت تحصیلی)');
            $table->char('term',7)->comment('نیمسال');
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
        Schema::dropIfExists('week_shes');
    }
}
