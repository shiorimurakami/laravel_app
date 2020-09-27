<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;
use Auth;

class TodoController extends Controller //Controller classを継承した
{
    private $todo; //同じクラスの中でのみアクセス可能。非公開で継承クラスからもアクセス不可能。

    public function __construct(Todo $instanceClass)
    {
        $this->middleware('auth');  // 追記
        //dd($this->middleware('auth'));
        $this->todo = $instanceClass;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todos = $this->todo->all();
        //dd($todos);
        //= SELECT * FROM todos;
        $todos = $this->todo->getByUserId(Auth::id());  // 追記
        return view('todo.index', ['todos'=>$todos]);

        //2：ビューで使用するデータの配列
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('todo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    //Form タグで送信した POST 情報を取得
    {
        //dd($request);
        $input = $request->all();
        //dd($input);
        //$input['test'] = 'hoge';
        $input['user_id'] = Auth::id();  // 追記
        $this->todo->fill($input)->save();
        return redirect()->route('todo.index');
        //redirect関数で取得したリダイレクタインスタンスにパスを指定
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $todo = $this->todo->find($id);
        return view('todo.edit', compact('todo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        //dd($this->todo->find($id)->fill($input));
        $this->todo->find($id)->fill($input)->save();
        return redirect()->route('todo.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->todo->find($id)->delete();
        return redirect()->route('todo.index');
    }
}
