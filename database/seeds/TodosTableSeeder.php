<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class TodosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //【truncateメソッド】全レコードを削除し、自動増分のIDを0にリセットする↓
        DB::table('todos')->truncate();
        //【insertメソッド】データベーステーブルにレコードを挿入する。挿入するカラム名と値の配列を引数に取る。↓
        DB::table('todos')->insert([
            [
                'title'      => 'Laravel Lessonを終わらせる',
                'created_at' => Carbon::create(2018, 1, 1),
                'updated_at' => Carbon::create(2018, 1, 4),
            ],
            [
                'title'      => 'レビューに向けて理解を深める',
                'created_at' => Carbon::create(2018, 2, 1),
                'updated_at' => Carbon::create(2018, 2, 5),
            ],
        ]);
    }
}
//DBファサードのtableメソッドを使用。tableメソッドは指定したテーブルに対するクエリビルダインスタンスを返す。これを使いクエリに制約を加え、最終的な結果を取得するチェーンを繋げる。
