<?php

namespace App\Services;

use App\Models\Task;
use App\Repositories\TaskRepository;
use Exception;

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
        $tasks = $this->taskRepository->tasks($user_id, $project_id, $q, $filter)->orderByDesc('created_at');

        return $paginate ? $tasks->paginate($paginate) : $tasks->get();
    }

    public function store(int $project_id, int $user_id, array $data) {
        try {
            $task = new Task($data);
            $task->project_id = $project_id;
            $task->user_id = $user_id;

            $success = $task->save();

            if(!$success) {
                throw new Exception('Не удалось добавить задачу', 500);
            }

            return (object) [
                'message' => 'Задача успешно добавлена',
                'code' => 200,
            ];
        } catch (Exception $e) {
            return (object) [
                'error' => $e->getMessage(),
                'code' => $e->getCode(),
            ];
        }
    }
}
