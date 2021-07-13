<form action="{{ route('register') }}" class="register-form" method="POST">
    @csrf
    @include('components\input-text\wrap', [
        'name' => 'name',
        'id' => 'name',
        'label' => __('Ваше имя'),
        'value' => old('name'),
        'error' => 'name',
    ])
    @include('components\input-text\wrap', [
        'name' => 'email',
        'id' => 'email',
        'label' => __('Ваш E-mail'),
        'value' => old('email'),
        'error' => 'email',
    ])
    @include('components\input-text\wrap', [
        'type' => 'password',
        'name' => 'password',
        'id' => 'password',
        'label' => __('Пароль'),
        'error' => 'password',
    ])
    @include('components\input-text\wrap', [
        'type' => 'password',
        'name' => 'password_confirmation',
        'id' => 'password_confirmation',
        'label' => __('Повторите пароль'),
        'error' => 'password',
    ])

    <button type="submit" class="button register-form__send">{!! __('Зарегистрироваться') !!}</button>

    <div class="login-form__register">
        <p class="login-form__register-text">{!! __('Есть аккаунт?') !!}</p>
        <a href="{{ route('page.login') }}" class="link register-form__login">{!! __('Войти') !!}</a>
    </div>
</form>
