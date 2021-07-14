<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use Illuminate\Http\Request;
use App\Services\TaskService;

class TaskController extends Controller
{
    private $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    public function store(int $project_id, TaskRequest $request)
    {
        $user_id = $request->user()->id;
        $data = $request->only([
            'name',
            'content',
        ]);

        $response = $this->taskService->store($project_id, $user_id, $data);

        session()->flash(isset($response->error) ? 'error' : 'success', $response->error ??  $response->message);
        return redirect()->route('page.projects.tasks', $project_id);
    }
}
