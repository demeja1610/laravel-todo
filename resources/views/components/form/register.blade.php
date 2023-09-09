<form action="{{ route('register') }}" class="register-form" method="POST">
    @csrf

    @include('components.input.text', [
        'name' => 'name',
        'id' => 'name',
        'label' => __('auth_form.name'),
        'value' => old('name'),
        'error' => 'name',
    ])

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
    @include('components.input.text', [
        'type' => 'password',
        'name' => 'password_confirmation',
        'id' => 'password_confirmation',
        'label' => __('auth_form.password_confirmation'),
        'error' => 'password',
    ])

    @include('components.button.primary', [
        'text' => __('auth_form.register'),
        'classes' => 'register-form__send',
    ])

    <p class="register-form__meta">
        {!! __('auth_form.already_registered') !!}

        <a href="{{ route('page.login') }}" class="link register-form__meta-link">
            {!! __('auth_form.login') !!}
        </a>
    </p>
</form>
