<div class="input-text {{ $classes ?? '' }}">
    @if (isset($label))
        <label class="input-text__label" for="{{ $id }}">
            {!! $label !!}
        </label>
    @endif

    <input
        type="{{ $type ?? '' }}"
        class="input-text__input {{ $inputClasses ?? '' }}"
        id="{{ $id }}"
        placeholder="{!! $placeholder ?? '' !!}"
        value="{!! $value ?? '' !!}"
        name="{{ $name }}"
    />

    @error($error)
        <p class="form-error input-text__error">{!! $message !!}</p>
    @enderror
</div>
