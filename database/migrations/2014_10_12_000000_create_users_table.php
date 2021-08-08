<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->char('CodePrsn',20)->comment('کدپرسنلی')->primary();
            $table->char('CodeNational',10)->comment('کد ملی');
            $table->string('Fname',30)->comment('نام');
            $table->string('Lname',30)->comment('نام خانوادگی');
            $table->char('CodeBrc',5)->comment('کد رشته تحصیلی')->nullable();
            $table->char('CodeRank',2)->comment('کد مدرک')->nullable();
            $table->char('CodeJab',5)->comment('کد سمت')->nullable();
            $table->char('CodeUni',5)->comment('کد دانشگاه')->nullable();
            $table->char('CodeSts',2)->comment('کد وضعیت')->default(0);
            $table->char('CodeAccess',2)->comment('کد سطح دسترسی')->nullable();
            $table->string('username',15)->unique()->comment('نام کاربری');
            $table->string('password')->comment('رمز عبور');
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
        Schema::dropIfExists('users');
    }
}
