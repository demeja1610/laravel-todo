<?php

namespace App\Repositories;

use App\Models\Project;

Class ProjectRepository {

    public function userProjects(int $user_id) {
        return Project::where('user_id', $user_id);
    }

    public function tasks(int $project_id) {
        return Project::where('id', $project_id)->with('tasks');
    }
}
