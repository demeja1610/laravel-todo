<div class="checkbox {{ $classes ?? '' }}">
    <input
        type="checkbox"
        class="checkbox__input {{ $inputClasses ?? '' }}"
        @isset($id)
            id="{{ $id }}"
        @endisset
        name="{{ $name }}"
        @isset($checked)
            checked="checked"
        @endisset
    >
    <label
        class="checkbox__label {{ $labelClasses ?? '' }}"
        @isset($id)
            for="{{ $id }}"
        @endisset
    >
        @isset($label)
            {!! $label !!}
        @endisset
    </label>
</div>
