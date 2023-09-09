<div class="checkbox {{ $classes ?? '' }}">
    <input
        type="checkbox"
        class="checkbox__input {{ $inputClasses ?? '' }}"
        id="{{ $id }}"
        name="{{ $name }}"
        @checked($checked ?? false)
    />

    <label class="checkbox__label {{ $labelClasses ?? '' }}" for="{{ $id }}">
        {!! $label !!}
    </label>
</div>
