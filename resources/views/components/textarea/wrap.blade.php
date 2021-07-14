<div class="textarea {{ $wrapperClasses ?? '' }}">
    @isset($label)
        <label class="textarea__label" @isset($id) for="{{ $id }}" @endisset>
            {!! $label !!}
        </label>
    @endisset
    <textarea autocomplete="{{ $autocomplete ?? 'doNotUseFreakingAutocomplete' }}"
        class="textarea__input {{ $inputClasses ?? '' }}" @isset($id) id="{{ $id }}" @endisset
        @isset($placeholder) placeholder="{!! $placeholder !!}" @endisset
        name="{{ $name }}">@if (!empty($value)){!! $value !!} @endif</textarea>
    @isset($error)
        @error($error)
            <p class="form-error textarea__error">{!! $message !!}</p>
        @enderror
    @endisset
</div>
