<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTodosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('todos', function (Blueprint $table) {
            //Schemaファザードでcreateメソッドを使う
            //最初の引数はテーブル名、２つ目は無名関数。クロージャを指定。クロージャでは、第１引数にBlueprintオブジェクト、第２引数に$tableを指定する。Blueprintオブジェクトのメソッドでカラムを定義する。カラムの型名が、そのままメソッド名になっている。(新しいテーブルを定義するためのBlueprintオブジェクトを取る。)

            $table->increments('id'); //自動増分ID
            $table->string('title'); //VARCHARカラム
            $table->timestamps();//created_atとupdate_atカラムの追加
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('todos'); //テーブル削除
    }
}
