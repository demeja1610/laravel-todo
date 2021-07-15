<?php

namespace App\Services;

use App\Repositories\ProjectRepository;

Class ProjectService {
    private $projectRepository;

    public function __construct(ProjectRepository $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }

    public function index(int $user_id, int $paginate = null) {
        $projects = $this->projectRepository->userProjects($user_id);

        return $paginate ? $projects->paginate($paginate) : $projects->get();
    }

    public function tasks(int $project_id) {
        return $this->projectRepository->tasks($project_id)->first();
    }
}
