<?php

namespace App\Http\Controllers;

use App\Enum\TaskStatusEnum;
use Illuminate\Http\Request;
use App\Enum\PermissionsEnum;
use App\Services\TaskService;
use App\Services\ProjectService;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\View;

class ProjectController extends Controller
{
    private $projectService;
    private $taskService;
    protected $taskStatuses;

    public function __construct(
        ProjectService $projectService,
        TaskService $taskService
    ) {
        $this->projectService = $projectService;
        $this->taskService = $taskService;
        $this->taskStatuses = TaskStatusEnum::getConstants();

        View::share('taskStatuses', $this->taskStatuses);
    }

    public function index(Request $request) {
        Gate::authorize(PermissionsEnum::manage_self_projects);

        $projects = $this->projectService->index($request->user()->id);

        return view('pages\projects', ['projects' => $projects]);
    }

    public function tasks(int $project_id, Request $request) {
        Gate::authorize(PermissionsEnum::manage_self_projects);

        $projects = $this->projectService->index($request->user()->id);
        $project = $projects->first(function($project) use ($project_id) {
            return $project->id === $project_id;
        });
        $user_id = $request->user()->id;
        $q = $request->input('q');
        $filter = in_array($request->input('filter'), TaskStatusEnum::getConstants()) ?
            $request->input('filter') :
            null;

        $tasks = $this->taskService->tasks($user_id, $project_id, $q, $filter);

        return view('pages\project-tasks', [
            'project' => $project,
            'projects' => $projects,
            'tasks' => $tasks,
        ]);
    }
}
