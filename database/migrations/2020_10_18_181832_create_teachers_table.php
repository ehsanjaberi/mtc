<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->char('CodePrsn',20)->comment('کدپرسنلی')->primary();
            $table->char('CodeRank',1)->comment('مدرک تحصیلی');
            $table->char('BrcName',100)->comment('رشته تحصیلی');
            $table->char('Telephone',12)->comment('تلفن ثابت');
            $table->char('PhoneNumber',13)->comment('تلفن همراه');
            $table->char('Email',100)->comment('پست الکترونیک');
            $table->string('Address',200)->comment('آدرس');
            $table->char('Status',1)->comment('وضعیت');
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
        Schema::dropIfExists('teachers');
    }
}
