<?php

namespace App\Http\Controllers;

use App\Enum\TaskStatusEnum;
use Illuminate\Http\Request;
use App\Services\TaskService;
use App\Services\ProjectService;
use App\Http\Requests\TaskRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class TaskController extends Controller
{
    private $taskService;
    private $projectService;

    public function __construct(
        TaskService $taskService,
        ProjectService $projectService
    ) {
        $this->taskService = $taskService;
        $this->projectService = $projectService;
    }

    public function edit(int $task_id, Request $request)
    {
        $user_id = Auth::id();

        $response = $this->taskService->edit($task_id, $user_id);

        if (isset($response->error)) {
            session()->flash('error', $response->error);
            return redirect()->back();
        }

        return view('pages.task-edit', [
            'task' => $response,
            'projects' => $this->projectService->index($user_id),
            'taskStatuses' => TaskStatusEnum::getConstants(),
        ]);
    }

    public function update(int $task_id, TaskRequest $request)
    {
        $user_id = Auth::id();

        $data = $request->only([
            'name',
            'content',
        ]);

        $response = $this->taskService->update($task_id, $user_id, $data);

        session()->flash(isset($response->error) ? 'error' : 'success', $response->error ??  $response->message);

        return redirect()->route('page.tasks.edit', $task_id);
    }


    public function store(int $project_id, TaskRequest $request)
    {
        $user_id = Auth::id();

        $data = $request->only([
            'name',
            'content',
        ]);

        $response = $this->taskService->store($project_id, $user_id, $data);

        session()->flash(isset($response->error) ? 'error' : 'success', $response->error ??  $response->message);

        return redirect()->route('page.projects.tasks', $project_id);
    }

    public function destroy(int $task_id)
    {
        $user_id = Auth::id();

        $response = $this->taskService->destroy($task_id, $user_id);

        session()->flash(isset($response->error) ? 'error' : 'success', $response->error ??  $response->message);

        return redirect()->back();
    }

    public function changeStatus(int $task_id, Request $request)
    {
        $user_id = Auth::id();
        $status = $request->input('status');

        $response = $this->taskService->changeStatus($task_id, $status, $user_id);

        session()->flash(isset($response->error) ? 'error' : 'success', $response->error ??  $response->message);

        return redirect()->back();
    }

    public function restore(int $task_id)
    {
        $user_id = Auth::id();

        $response = $this->taskService->restore($task_id, $user_id);

        session()->flash(isset($response->error) ? 'error' : 'success', $response->error ??  $response->message);

        return redirect()->back();
    }
}
