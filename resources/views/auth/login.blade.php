@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>
                <!-- __()を使うと、自動的にターゲットの言語テキストが表示される 指定した翻訳文字列が存在しない場合、__関数は翻訳文字列キーをそのまま返す-->

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf <!-- CSRF対策tokenのinputタグを生成する -->


                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                                <!-- 条件式 ? 式1 : 式2【三項演算子】-->
                                <!-- 条件式を評価し、TRUEであれば式1、FALSEであれば式2を返す-->

                                @if ($errors->has('email'))
                                <!-- $errors->has：エラーの存在チェック -->
                                <!-- Illuminate\Support\ViewErrorBag #1136 ▼ 卍 #bags: [] -->
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                        <!-- $errors->first：指定したフィールドの最初のエラーメッセージを取得配列形式で結果が返ってくるため、first()で最初のものを取得 -->
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <!-- old関数：指定した文字列の入力が存在していないときは、nullを返す-->
                                    <!-- 条件式 ? 式1 : 式2【三項演算子】-->
                                    <!-- 条件式を評価し、TRUEであれば式1、FALSEであれば式2を返す-->

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
