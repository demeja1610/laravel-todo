<?php

namespace App\Services;

use App\Enum\TaskStatusEnum;
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

    public function edit(int $task_id, int $user_id = null) {
        try {
            $task = Task::byId($task_id)->first();

            if (!$task) {
                throw new Exception('Задача не найдена', 404);
            }

            if ($user_id) {
                if ($task->user_id !== $user_id) {
                    throw new Exception('Вы не можете изменять задачи других пользователей', 403);
                }
            }

            return $task;
        } catch (Exception $e) {
            return (object) [
                'error' => $e->getMessage(),
                'code' => $e->getCode(),
            ];
        }
    }

    public function update(int $task_id, int $user_id = null, array $data) {
        try {
            $task = Task::byId($task_id)->first();

            if (!$task) {
                throw new Exception('Задача не найдена', 404);
            }

            if ($user_id) {
                if ($task->user_id !== $user_id) {
                    throw new Exception('Вы не можете изменять задачи других пользователей', 403);
                }
            }

            $task->name = $data['name'];
            $task->content = $data['content'];

            $success = $task->save();

            if (!$success) {
                throw new Exception('Не удалось изменить задачу', 500);
            }

            return (object) [
                'message' => 'Задача успешно изменена',
                'code' => 200,
            ];
        } catch (Exception $e) {
            return (object) [
                'error' => $e->getMessage(),
                'code' => $e->getCode(),
            ];
        }
    }

    public function store(int $project_id, int $user_id, array $data)
    {
        try {
            $task = new Task($data);
            $task->project_id = $project_id;
            $task->user_id = $user_id;

            $success = $task->save();

            if (!$success) {
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

    public function destroy(int $task_id, int $user_id = null)
    {
        try {
            $task = Task::byId($task_id)->first();

            if (!$task) {
                throw new Exception('Задача не найдена', 404);
            }

            if ($user_id) {
                if ($task->user_id !== $user_id) {
                    throw new Exception('Вы не можете удалять задачи других пользователей', 403);
                }
            }

            $success = $task->delete();

            if (!$success) {
                throw new Exception('Не удалось удалить задачу', 500);
            }

            return (object) [
                'message' => 'Задача успешно удалена',
                'code' => 200,
            ];
        } catch (Exception $e) {
            return (object) [
                'error' => $e->getMessage(),
                'code' => $e->getCode(),
            ];
        }
    }

    public function changeStatus(int $task_id, string $status, int $user_id = null)
    {
        try {
            $task = Task::byId($task_id)->first();

            if (!$task) {
                throw new Exception('Задача не найдена', 404);
            }

            if ($user_id) {
                if ($task->user_id !== $user_id) {
                    throw new Exception('Вы не можете изменять задачи других пользователей', 403);
                }
            }

            $taskStatuses = TaskStatusEnum::getConstants();

            if (!in_array($status, $taskStatuses)) {
                throw new Exception('Неверно указан статус', 500);
            }

            $task->status = $status;
            $success = $task->save();

            if (!$success) {
                throw new Exception('Не удалось изменить статус задачи', 500);
            }

            return (object) [
                'message' => 'Статус задачи успешно изменен',
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
