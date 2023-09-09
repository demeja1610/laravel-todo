<form action="{{ route('login') }}" class="login-form" method="POST">
    @csrf

    @include('components.input.text', [
        'name' => 'email',
        'id' => 'email',
        'label' => __('auth_form.email'),
        'value' => old('email'),
        'error' => 'email',
    ])

    @include('components.input.text', [
        'type' => 'password',
        'name' => 'password',
        'id' => 'password',
        'label' => __('auth_form.password'),
        'error' => 'password',
    ])

    @include('components.input.checkbox', [
        'classes' => 'login-form__remember',
        'name' => 'remember',
        'id' => 'remember',
        'label' => __('auth_form.remember'),
    ])

    @include('components.button.primary', [
        'text' => __('auth_form.login'),
        'classes' => 'login-form__send',
    ])

    <p class="login-form__meta">
        {!! __('auth_form.no_account') !!}

        <a href="{{ route('page.register') }}" class="link login-form__meta-link">
            {!! __('auth_form.register') !!}
        </a>
    </p>
</form>
