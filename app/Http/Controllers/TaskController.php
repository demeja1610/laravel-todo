<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dto\Task\CreateTaskDto;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateTaskRequest;
use App\Repositories\Task\TaskRepositorySpecifier;
use App\Interfaces\Repositories\TaskRepositoryInterface;

class TaskController extends Controller
{
    public function __construct(protected TaskRepositoryInterface $taskRepository)
    {
    }

    public function index(Request $request)
    {
        $userId = Auth::id();
        $page = $request->get('page');
        $completed = $request->get('completed');

        $specifier = new TaskRepositorySpecifier();

        $specifier->setUserId($userId)
            ->setOrderBy('created_at')
            ->setOrdeDirection('desc')
            ->setCompleted(false);

        $tasks = $this->taskRepository->matchSimplePaginated(
            specifier: $specifier,
            perPage: 25,
            page: $page
        );

        return view('pages.tasks', compact([
            'tasks',
        ]));
    }

    public function store(CreateTaskRequest $request)
    {
        $createDto = new CreateTaskDto(
            title: $request->get('title'),
            userId: Auth::id()
        );

        $this->taskRepository->create($createDto);

        return redirect()->route('page.tasks');
    }

    public function toggleFavorite($id)
    {
        $userId = Auth::id();

        $specifier = new TaskRepositorySpecifier();

        $specifier->setUserId($userId)
            ->setId($id);

        $this->taskRepository->toggleFavorite($specifier);

        return redirect()->back();
    }

    public function toggleComplete($id)
    {
        $userId = Auth::id();

        $specifier = new TaskRepositorySpecifier();

        $specifier->setUserId($userId)
            ->setId($id);

        /**
         * TODO: Specify select columns, cause we only need `completed_at` here
         */
        $task = $this->taskRepository->firstMatching($specifier);

        if ($task) {
            $task->completed_at === null
                ? $this->taskRepository->complete($specifier)
                : $this->taskRepository->uncomplete($specifier);
        }

        return redirect()->back();
    }

    public function delete($id)
    {
        $userId = Auth::id();

        $specifier = new TaskRepositorySpecifier();

        $specifier->setUserId($userId)
            ->setId($id)
            ->setWithTrashed(true);

        /**
         * TODO: Specify select columns, cause we only need `deleted_at` here
         */
        $task = $this->taskRepository->firstMatching($specifier);

        if ($task) {
            $task->deleted_at === null
                ? $this->taskRepository->delete($specifier)
                : $this->taskRepository->destroy($specifier);
        }

        return redirect()->back();
    }

    public function restore($id)
    {
        $userId = Auth::id();

        $specifier = new TaskRepositorySpecifier();

        $specifier->setUserId($userId)
            ->setId($id)
            ->setWithTrashed(true);

        $this->taskRepository->restore($specifier);

        return redirect()->back();
    }
}
