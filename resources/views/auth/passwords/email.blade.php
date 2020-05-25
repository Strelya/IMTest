@extends('index')

@section('content')
    <div class="account_grid">
        <div class="login-right">
            <h3>ВОССТАНОВЛЕНИЕ ПАРОЛЯ</h3>
            <p>Для восстановления доступа к административной панели, при забытом пароле, введите Email</p>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <form method="POST" action="{{ route('password.email') }}">
                {{ csrf_field() }}

                <div class="{{ $errors->has('email') ? ' has-error' : '' }}">
                    <span>Email<label for="email">*</label></span>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required>
                    @if ($errors->has('email'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif
                </div>
                <input type="submit" value="Восстановить пароль">
            </form>
        </div>
        <div class="clearfix"> </div>
@endsection
