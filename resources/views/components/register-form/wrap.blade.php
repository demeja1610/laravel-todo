<form action="#" class="register-form" method="POST">
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
    <a href="{{ route('page.login') }}" class="link register-form__login">{!! __('Войти') !!}</a>
    <button class="submit">{!! __('Зарегистрироваться') !!}</button>
</form>
