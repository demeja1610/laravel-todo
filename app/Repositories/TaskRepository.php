<?php

namespace App\Repositories;

use App\Models\Task;

Class TaskRepository {

    public function tasks(
        int $user_id = null,
        int $project_id = null,
        string $q = null,
        string $filter = null
    ) {
        $tasks = Task::query();

        if($user_id) {
            $tasks->where('user_id', $user_id);
        }

        if($project_id) {
            $tasks->where('project_id', $project_id);
        }

        if($q) {
            $tasks->where('name', 'like', '%'. $q .'%');
        }

        if($filter) {
            if ($filter === 'deleted') {
                $tasks->onlyTrashed();
            } else {
                $tasks->where('status', $filter);
            }
        }

        return $tasks;
    }
}
