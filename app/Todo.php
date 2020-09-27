<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model //class クラス名 extends 継承元クラス名
{
    protected $fillable = [
        'title',
        'user_id'
    ];
    //複数代入したいモデル属性の指定
    public function getByUserId($id)
    {
        return $this->where('user_id', $id)->get();
    }
}

//protected アクセス修飾子。そのクラス自身と継承クラスからアクセス可能。つまり非公開だが、継承は可能。