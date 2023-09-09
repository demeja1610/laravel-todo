<?php

namespace App\Interfaces\Repositories;

use App\Models\Task;
use App\Dto\Task\CreateTaskDto;
use Illuminate\Contracts\Pagination\Paginator;
use App\Repositories\Task\TaskRepositorySpecifier;
use Illuminate\Contracts\Pagination\CursorPaginator;

interface TaskRepositoryInterface
{
    public function firstMatching(TaskRepositorySpecifier $specifier): ?Task;

    /**
     * @return \Illuminate\Pagination\CursorPaginator<\App\Models\Task>
     */
    public function matchCursorPaginated(TaskRepositorySpecifier $specifier, ?int $perPage = null, ?string $cursor = null): CursorPaginator;

    public function matchSimplePaginated(TaskRepositorySpecifier $specifier, ?int $perPage = null, ?int $page = null): Paginator;

    public function create(CreateTaskDto $data): Task;

    public function delete(TaskRepositorySpecifier $specifier): int;

    public function destroy(TaskRepositorySpecifier $specifier): int;

    public function restore(TaskRepositorySpecifier $specifier): int;

    public function complete(TaskRepositorySpecifier $specifier): int;

    public function uncomplete(TaskRepositorySpecifier $specifier): int;

    public function toggleFavorite(TaskRepositorySpecifier $specifier): int;
}
