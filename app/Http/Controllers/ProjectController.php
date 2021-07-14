<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Enum\PermissionsEnum;
use App\Services\ProjectService;
use Illuminate\Support\Facades\Gate;

class ProjectController extends Controller
{
    private $projectService;

    public function __construct(ProjectService $projectService)
    {
        $this->projectService = $projectService;
    }

    public function index(Request $request) {
        Gate::authorize(PermissionsEnum::manage_self_projects);

        $projects = $this->projectService->index($request->user()->id);

        return view('pages\projects', ['projects' => $projects]);
    }

    public function tasks(int $project_id, Request $request) {
        Gate::authorize(PermissionsEnum::manage_self_projects);

        $projects = $this->projectService->index($request->user()->id);
        $project = $this->projectService->tasks($project_id);

        return view('pages\project-tasks', [
            'project' => $project,
            'projects' => $projects,
        ]);
    }
}
