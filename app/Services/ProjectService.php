<?php

namespace App\Services;

use App\Repositories\ProjectRepository;

Class ProjectService {
    private $projectRepository;

    public function __construct(ProjectRepository $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }

    public function index(int $user_id) {
        return $this->projectRepository->userProjects($user_id)->get();
    }

    public function tasks(int $project_id) {
        return $this->projectRepository->tasks($project_id)->first();
    }
}
