<div class="checkbox {{ $classes ?? '' }}">
    @isset($label)
        <label
            class="checkbox__label {{ $labelClasses ?? '' }}"
            @isset($id)
                for="{{ $id }}"
            @endisset
        >
            {!! $label !!}
        </label>
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
    @endisset
</div>
