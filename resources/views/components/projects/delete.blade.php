<form action="{{ route('projects.destroy', $project->id) }}" class="projects__item-delete" method="POST">
    @method('delete')
    @csrf
    <button class="projects__item-action projects__item-delete">
        {!! __('Удалить') !!}
        @include('icons.trash', ['iClasses' => 'projects__item-action-icon'])
    </button>
</form>
