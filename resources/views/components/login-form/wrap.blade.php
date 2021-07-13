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
        'name' => 'remember_me',
        'id' => 'remember_me',
        'label' => __('Запомнить меня'),
    ])
    <a href="{{ route('page.register') }}" class="link login-form__register">{!! __('Зарегистрироваться') !!}</a>
    <button class="submit">{!! __('Войти') !!}</button>
</form>
