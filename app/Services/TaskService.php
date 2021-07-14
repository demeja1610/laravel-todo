<?php

namespace App\Services;

use App\Repositories\TaskRepository;

class TaskService
{
    private $taskRepository;

    public function __construct(TaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    public function tasks(
        int $user_id = null,
        int $project_id = null,
        string $q = null,
        string $filter = null,
        int $paginate = null
    ) {
        $tasks = $this->taskRepository->tasks($user_id, $project_id, $q, $filter);

        return $paginate ? $tasks->paginate($paginate) : $tasks->get();
    }
}
