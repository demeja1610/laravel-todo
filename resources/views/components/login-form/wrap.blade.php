<form action="{{ route('login') }}" class="login-form" method="POST">
    @csrf
    @include('components\input-text\wrap', [
        'name' => 'email',
        'id' => 'email',
        'label' => __('E-mail'),
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
    @include('components\checkbox\wrap', [
        'classes' => 'login-form__remember',
        'name' => 'remember_me',
        'id' => 'remember_me',
        'label' => __('Запомнить меня'),
    ])

    <button type="submit" class="button login-form__send">{!! __('Войти') !!}</button>

    <div class="login-form__register">
        <p class="login-form__register-text">{!! __('Нет аккаунта?') !!}</p>
        <a href="{{ route('page.register') }}" class="link login-form__register-link">{!! __('Зарегистрироваться') !!}</a>
    </div>
</form>
