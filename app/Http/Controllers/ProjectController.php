<?php

namespace App\Http\Controllers;

use App\Enum\TaskStatusEnum;
use Illuminate\Http\Request;
use App\Services\TaskService;
use App\Services\ProjectService;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\View;
use App\Http\Requests\ProjectRequest;
use Illuminate\Support\Facades\Auth;

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

    public function index(Request $request)
    {
        $user_id = Auth::id();
        $q = $request->input('q');
        $filter = $request->input('filter') === 'deleted' ? $request->input('filter') : null;

        $projects = $this->projectService->index($user_id, $filter, $q, 20);

        return view('pages.projects', ['projects' => $projects]);
    }

    public function edit(int $project_id, Request $request)
    {
        $user_id = Auth::id();
        $response = $this->projectService->edit($project_id, $user_id);

        if (isset($response->error)) {
            session()->flash('error', $response->error);
            return redirect()->back();
        }

        return view('pages.project-edit', [
            'project' => $response,
        ]);
    }

    public function update(int $project_id, ProjectRequest $request)
    {
        $user_id = Auth::id();

        $data = $request->only([
            'name',
        ]);

        $response = $this->projectService->update($project_id, $user_id, $data);

        session()->flash(isset($response->error) ? 'error' : 'success', $response->error ??  $response->message);

        return redirect()->route('page.projects.edit', $project_id);
    }

    public function store(ProjectRequest $request)
    {
        $user_id = Auth::id();

        $data = $request->only([
            'name',
        ]);

        $response = $this->projectService->store($user_id, $data);

        session()->flash(isset($response->error) ? 'error' : 'success', $response->error ??  $response->message);

        return redirect()->route('page.projects');
    }

    public function destroy(int $project_id)
    {
        $user_id = Auth::id();

        $response = $this->projectService->destroy($project_id, $user_id);

        session()->flash(isset($response->error) ? 'error' : 'success', $response->error ??  $response->message);

        return redirect()->back();
    }

    public function tasks(int $project_id, Request $request)
    {
        $user_id = Auth::id();
        $filters = TaskStatusEnum::getConstants();
        $project = $this->projectService->single($project_id, $user_id);
        $q = $request->input('q');
        $filter = in_array($request->input('filter'), $filters) || $request->input('filter') === 'deleted'
            ? $request->input('filter')
            : null;

        $tasks = $this->taskService->tasks($user_id, $project_id, $q, $filter, 20);

        return view('pages.project-tasks', [
            'project' => $project,
            'tasks' => $tasks,
        ]);
    }

    public function restore(int $project_id)
    {
        $user_id = Auth::id();

        $response = $this->projectService->restore($project_id, $user_id);

        session()->flash(isset($response->error) ? 'error' : 'success', $response->error ??  $response->message);

        return redirect()->back();
    }
}
