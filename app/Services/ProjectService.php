<?php

namespace App\Services;

use App\Enum\PermissionsEnum;
use Exception;
use App\Models\Project;
use Illuminate\Support\Facades\Gate;
use App\Repositories\ProjectRepository;

class ProjectService
{
    private $projectRepository;

    public function __construct(ProjectRepository $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }

    public function index(int $user_id = null, string $q = null, int $paginate = null)
    {
        $projects = $this->projectRepository->userProjects($user_id, $q)->orderByDesc('created_at');

        return $paginate ? $projects->paginate($paginate) : $projects->get();
    }

    public function edit(int $project_id, int $user_id = null)
    {
        try {
            $project = $this->single($project_id, $user_id);

            if(isset($project->error)) {
                throw new Exception($project->error, $project->code);
            }

            return $project;
        } catch (Exception $e) {
            return (object) [
                'error' => $e->getMessage(),
                'code' => $e->getCode(),
            ];
        }
    }

    public function update(int $project_id, int $user_id = null, array $data)
    {
        try {
            $project = Project::byId($project_id)->first();

            if (!$project) {
                throw new Exception('Проект не найден', 404);
            }

            if ($user_id  && Gate::denies(PermissionsEnum::manage_projects)) {
                if ($project->user_id !== $user_id) {
                    throw new Exception('Вы не можете изменять проекты других пользователей', 403);
                }
            }

            $project->name = $data['name'];

            $success = $project->save();

            if (!$success) {
                throw new Exception('Не удалось удалить проект', 500);
            }

            return (object) [
                'message' => 'Проект успешно изменен',
                'code' => 200,
            ];
        } catch (Exception $e) {
            return (object) [
                'error' => $e->getMessage(),
                'code' => $e->getCode(),
            ];
        }
    }

    public function store(int $user_id, array $data)
    {
        try {
            $project = new Project($data);
            $project->user_id = $user_id;

            $success = $project->save();

            if (!$success) {
                throw new Exception('Не удалось добавить проект', 500);
            }

            return (object) [
                'message' => 'Проект успешно добавлен',
                'code' => 200,
            ];
        } catch (Exception $e) {
            return (object) [
                'error' => $e->getMessage(),
                'code' => $e->getCode(),
            ];
        }
    }

    public function destroy(int $project_id, int $user_id = null)
    {
        try {
            $project = Project::byId($project_id)->first();

            if (!$project) {
                throw new Exception('Проект не найден', 404);
            }

            if ($user_id  && Gate::denies(PermissionsEnum::manage_projects)) {
                if ($project->user_id !== $user_id) {
                    throw new Exception('Вы не можете удалять проекты других пользователей', 403);
                }
            }

            $success = $project->delete();

            if (!$success) {
                throw new Exception('Не удалось удалить проект', 500);
            }

            return (object) [
                'message' => 'Проект успешно удален',
                'code' => 200,
            ];
        } catch (Exception $e) {
            return (object) [
                'error' => $e->getMessage(),
                'code' => $e->getCode(),
            ];
        }
    }

    public function tasks(int $project_id)
    {
        return $this->projectRepository->tasks($project_id)->first();
    }

    public function single(int $project_id, int $user_id = null)
    {
        try {
            $project = Project::byId($project_id)->first();

            if (!$project) {
                throw new Exception('Проект не найден', 404);
            }

            if ($user_id && Gate::denies(PermissionsEnum::manage_projects)) {
                if ($project->user_id !== $user_id) {
                    throw new Exception('Запрошенный проект принадлежит другому пользователю', 403);
                }
            }

            return $project;
        } catch (Exception $e) {
            return (object) [
                'error' => $e->getMessage(),
                'code' => $e->getCode(),
            ];
        }
    }
}
