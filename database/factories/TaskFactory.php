<?php

namespace Database\Factories;

use App\Enum\TaskStatusEnum;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Task::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $project = Project::find($this->faker->numberBetween(1, 10), ['id', 'user_id']);

        return [
            'name' => $this->faker->text(50),
            'content' => $this->faker->text(200),
            'user_id' => $project->user_id,
            'project_id' => $project->id,
            'status' => $this->faker->randomElement(TaskStatusEnum::getConstants()),
        ];
    }
}
