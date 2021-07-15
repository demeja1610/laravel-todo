<?php

namespace App\Repositories;

use App\Models\Project;

Class ProjectRepository {

    public function userProjects(int $user_id = null, string $q = null) {
        $projects = Project::query();

        if($user_id) {
            $projects->where('user_id', $user_id);
        }

        if($q) {
            $projects->where('name', 'like', '%'. $q .'%');
        }

        return $projects;
    }

    public function tasks(int $project_id) {
        return Project::where('id', $project_id)->with('tasks');
    }
}
