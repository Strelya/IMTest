@extends('layouts.app')

@section('content')
    <div class="account_grid">
        <div class="login-right">
            <h3>ИЗМЕНЕНИЕ ПАРОЛЯ</h3>
            <p>Для восстановления доступа к административной панели, при забытом пароле, введите Email</p>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <form method="POST" action="{{ route('password.request') }}">
                {{ csrf_field() }}

                <input type="hidden" name="token" value="{{ $token }}">

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
                <input type="submit" value="Изменить пароль">
            </form>
        </div>
        <div class="clearfix"> </div>
@endsection
