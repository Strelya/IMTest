@extends('index')

@section('content')
    <div class="account_grid">
        <div class="login-right">
            <h3>НОВЫЙ ПОЛЬЗОВАТЕЛЬ</h3>
            <p>Для добавления и редактирования товаров и категорий необходимо создать аккаунт</p>
            <form method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}

                <div class="{{ $errors->has('name') ? ' has-error' : '' }}">
                    <span>Имя<label for="name">*</label></span>
                    <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>

                    @if ($errors->has('name'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                    @endif
                </div>

                <div class="{{ $errors->has('email') ? ' has-error' : '' }}">
                    <span>Email<label for="email">*</label></span>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required>
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
                </div>

                <div>
                    <span>Повторите пароль<label for="password-confirm">*</label></span>
                    <input id="password-confirm" type="password" name="password_confirmation" required>
                </div>

                <a class="forgot" href="{{ route('password.request') }}">Забыли пароль?</a>
                <input type="submit" value="Регистрация">
            </form>
        </div>
        <div class="clearfix"> </div>
@endsection