<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/todo';
    protected $maxAttempts = 3;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        //このコントローラ内の全アクションを、認証済みユーザーだけがアクセスできるよう保護する
        // dd($this);
        //dd($this->middleware('guest'));
        //Illuminate\Routing\ControllerMiddlewareOptions {#1104 ▼
        //#options: & []

        //コントローラーにミドルウェアを登録します。
        //ミドルウェアが除外するコントローラーメソッドを設定します。
    }

    protected function loggedOut(Request $request)
    {
        return redirect('/login');
    }
}