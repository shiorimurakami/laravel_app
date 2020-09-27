<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserIdToTodosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    //マイグレート(migrate)をした時に、実行される処理
    {
        Schema::table('todos', function (Blueprint $table) {
            $table->integer('user_id');
            //Schema::tableメソッド：既に存在するテーブルを更新する
            //最初の引数はテーブル名、２つ目は無名関数。クロージャを指定。クロージャでは、第１引数にBlueprintオブジェクト、第２引数に$tableを指定する。Blueprintオブジェクトのメソッドでカラムを定義する。カラムの型名が、そのままメソッド名になっている。(新しいテーブルを定義するためのBlueprintオブジェクトを取る。)
            //integer:テーブルに新しいカラムを作成(整数)
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    //ロールバック(rollback:なかった事にする)した時に、実行される処理
    {
        Schema::table('todos', function (Blueprint $table) {
            $table->dropColumn('user_id');
            //DBからカラムをドロップ（削除）する
        });
    }
}
