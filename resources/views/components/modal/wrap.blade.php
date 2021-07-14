<div class="modal {{ isset($active) && $active === true ? 'active' : '' }}" data-modal="{{ $dataModal }}">
    <div class="modal__header">
        <button class="modal__close"></button>
    </div>
    <div class="modal__content">
        {!! $modalContent !!}
    </div>
</div>
