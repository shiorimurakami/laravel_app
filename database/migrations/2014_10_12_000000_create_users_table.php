<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id'); //自動増分ID
            $table->string('name'); //VARCHARカラム
            $table->string('email')->unique(); //ユニークキーを追加
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password'); //VARCHARカラム
            $table->rememberToken(); //VARCHAR(100) NULLのremember_tokenを追加
            $table->timestamps(); //TIMESTAMPカラム
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
