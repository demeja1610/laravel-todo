<?php

namespace App\Repositories\Task;

use Carbon\Carbon;
use App\Models\Task;
use App\Dto\Task\CreateTaskDto;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Contracts\Pagination\Paginator;
use App\Repositories\Task\TaskRepositorySpecifier;
use Illuminate\Contracts\Pagination\CursorPaginator;
use App\Interfaces\Repositories\TaskRepositoryInterface;

class TaskRepository implements TaskRepositoryInterface
{
    public function firstMatching(TaskRepositorySpecifier $specifier): ?Task
    {
        $query = $this->baseModelQuery();

        $query = $specifier->apply($query);

        return $query->first();
    }

    public function matchCursorPaginated(TaskRepositorySpecifier $specifier, ?int $perPage = null, ?string $cursor = null): CursorPaginator
    {
        $query = $this->baseModelQuery();

        $query = $specifier->apply($query);

        return $query->cursorPaginate(perPage: $perPage, cursor: $cursor);
    }

    public function matchSimplePaginated(TaskRepositorySpecifier $specifier, ?int $perPage = null, ?int $page = null): Paginator
    {
        $query = $this->baseModelQuery();

        $query = $specifier->apply($query);

        return $query->simplePaginate(perPage: $perPage, page: $page);
    }

    public function create(CreateTaskDto $data): Task
    {
        $query = $this->baseModelQuery();

        return $query->create($data->toAttributesArray());
    }

    public function delete(TaskRepositorySpecifier $specifier): int
    {
        $query = $this->baseModelQuery();

        $query = $specifier->apply($query);

        return $query->delete();
    }

    public function destroy(TaskRepositorySpecifier $specifier): int
    {
        $query = $this->baseModelQuery();

        $query = $specifier->apply($query);

        return $query->forceDelete();
    }

    public function restore(TaskRepositorySpecifier $specifier): int
    {
        $query = $this->baseModelQuery();

        $query = $specifier->apply($query);

        return $query->restore();
    }

    public function complete(TaskRepositorySpecifier $specifier): int
    {
        $query = $this->baseModelQuery();

        $query = $specifier->apply($query);

        return $query->update([
            'completed_at' => Carbon::now(),
        ]);
    }

    public function uncomplete(TaskRepositorySpecifier $specifier): int
    {
        $query = $this->baseModelQuery();

        $query = $specifier->apply($query);

        return $query->update([
            'completed_at' => null,
        ]);
    }

    public function toggleFavorite(TaskRepositorySpecifier $specifier): int
    {
        $query = $this->baseModelQuery();

        $query = $specifier->apply($query);

        return $query->update([
            'favorite' => DB::raw('NOT favorite'),
        ]);
    }

    protected function baseModelQuery(): Builder
    {
        return Task::query();
    }
}
