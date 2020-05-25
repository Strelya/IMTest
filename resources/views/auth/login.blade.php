@extends('index')

@section('content')
    <div class="account_grid">
        <div class="login-right">
            <h3>СТРАНИЦА АВТОРИЗАЦИИ</h3>
            <p>Для входа в панель администрирования необходимо авторизироваться</p>
            <form method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}
                <div class="{{ $errors->has('email') ? ' has-error' : '' }}">
                    <span>Email<label for="email">*</label></span>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
                    @if ($errors->has('email'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif
                </div>
                <div class="{{ $errors->has('password') ? ' has-error' : '' }}">
                    <span>Пароль<label for="password">*</label></span>
                    <input id="password" type="password" name="password" required>

                    @if ($errors->has('password'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                    @endif
                    <label>
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Запомнить
                    </label>
                </div>

                <a class="forgot" href="{{ route('password.request') }}">Забыли пароль?</a>
                <input type="submit" value="Логин">
            </form>
        </div>
        <div class=" login-left">
            <h3>НОВЫЙ ПОЛЬЗОВАТЕЛЬ</h3>
            <p>Для добавления и редактирования товаров и категорий необходимо создать аккаунт</p>
            <a class="acount-btn" href="{{ route('register') }}">Создать аккаунт</a>
        </div>
        <div class="clearfix"> </div>
@endsection