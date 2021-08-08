<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->char('CodePrsn',20)->comment('کدپرسنلی')->primary();
            $table->char('CountUnit',3)->comment('تعداد واحد گذرانده');
            $table->char('Email',100)->comment('پست الکترونیک');
            $table->char('Telephone',12)->comment('تلفن ثابت');
            $table->char('PhoneNumber',13)->comment('تلفن همراه');
            $table->string('Address',200)->comment('آدرس');
            $table->char('ProjectMasterCode',20)->comment('کد استاد پروژه');
            $table->char('ProjectAdvisorCode',20)->comment('کد ستاد مشاور');
            $table->string('Title',200)->comment('عنوان پروژه');
            $table->boolean('ProjectType')->comment('نوع پروژه');
            $table->char('Proposed',1)->comment('پیشنهاد پروژه');
            $table->string('GroupMember',200)->comment('اعضای گروه')->nullable();
            $table->text('Summary')->comment('شرح خلاصه');
            $table->text('Equipment')->comment('امکانات و تجهیزات');
            $table->text('HowDoJob')->comment('روش انجام کار');
            $table->char('status',1)->comment('وضعیت فرم')->default(0);
            $table->text('Message')->comment('پیام استاد به دانشجو')->nullable();
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
        Schema::dropIfExists('projects');
    }
}
