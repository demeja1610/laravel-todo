<div class="textarea {{ $classes ?? '' }}">
    <label class="textarea__label" for="{{ $id }}">
        {!! $label !!}
    </label>

    <textarea
        class="textarea__input {{ $inputClasses ?? '' }}"
        id="{{ $id }}"
        placeholder="{!! $placeholder ?? '' !!}"
        name="{{ $name }}">{{ $value ?? '' }}</textarea>

    @error($error)
        <p class="form-error textarea__error">{!! $message !!}</p>
    @enderror
</div>
