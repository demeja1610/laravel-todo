<form action="{{ route('projects.restore', $project->id) }}" method="POST">
    @method('put')
    @csrf
    <button class="projects__item-action projects__item-delete">
        @include('icons.restore', ['iClasses' => 'projects__item-action-icon'])
    </button>
</form>
