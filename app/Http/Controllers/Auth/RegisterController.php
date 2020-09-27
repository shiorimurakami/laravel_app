<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |このコントローラーは、新規ユーザーの登録とその検証および作成を処理します。デフォルトでは、このコントローラーはトレイトを使用して、追加のコードを必要とせずにこの機能を提供します。
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/todo';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        // dd($this);
        // dd($this);->RegisterController
        //dd($this->middleware('guest'));
        //Illuminate\Routing\ControllerMiddlewareOptions {#1104 ▼
        //  #options: & []
        //}
    }

    /**
     * Get a validator for an incoming registration request.
     *着信登録要求のバリデーターを取得します。
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        //新しいバリデータインスタンスを生成
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            //フィールドがそのフィールド名＋_confirmationフィールドと同じ値であることをバリデートします。例えば、バリデーションするフィールドがpasswordであれば、同じ値のpassword_confirmationフィールドが入力に存在していなければなりません
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *有効な登録後に新しいユーザーインスタンスを作成する
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            //カラム列 => $dataの各value値
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
