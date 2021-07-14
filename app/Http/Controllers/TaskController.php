<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Enum\PermissionsEnum;
use App\Services\TaskService;
use App\Http\Requests\TaskRequest;
use Illuminate\Support\Facades\Gate;

class TaskController extends Controller
{
    private $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    public function store(int $project_id, TaskRequest $request)
    {
        Gate::authorize(PermissionsEnum::manage_self_tasks);

        $user_id = $request->user()->id;
        $data = $request->only([
            'name',
            'content',
        ]);

        $response = $this->taskService->store($project_id, $user_id, $data);

        session()->flash(isset($response->error) ? 'error' : 'success', $response->error ??  $response->message);
        return redirect()->route('page.projects.tasks', $project_id);
    }

    public function destroy(int $task_id, Request $request) {
        Gate::authorize(PermissionsEnum::manage_self_tasks);

        $user_id = $request->user()->id;
        $response = $this->taskService->destroy($task_id, $user_id);

        session()->flash(isset($response->error) ? 'error' : 'success', $response->error ??  $response->message);
        return redirect()->back();
    }

    public function changeStatus(int $task_id, Request $request) {
        $user_id = $request->user()->id;
        $status = $request->input('status');

        $response = $this->taskService->changeStatus($task_id, $status, $user_id);

        session()->flash(isset($response->error) ? 'error' : 'success', $response->error ??  $response->message);
        return redirect()->back();
    }
}
