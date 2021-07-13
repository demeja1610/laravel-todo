<div class="input-text {{ $wrapperClasses ?? '' }}">
    @isset($label)
        <label
            class="input-text__label"
            @isset($id)
                for="{{ $id }}"
            @endisset
        >
            {!! $label !!}
        </label>
    @endisset
    <input
        autocomplete="{{ $autocomplete ?? 'doNotUseFreakingAutocomplete' }}"
        type="{{ $type ?? 'text' }}"
        class="input-text__input {{ $inputClasses ?? '' }}"
        @isset($id)
            id="{{ $id }}"
        @endisset
        @isset($placeholder)
            placeholder="{!! $placeholder !!}"
        @endisset
        @if(!empty($value))
            value="{!! $value !!}"
        @endif
        name="{{ $name }}"
    >
    @isset($error)
        @error($error)
            <p class="input-text__error">{!! $message !!}</p>
        @enderror
    @endisset
</div>
