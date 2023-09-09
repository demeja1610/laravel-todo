<?php

namespace App\Dto\Task;

use App\Interfaces\Dto\DtoInterface;
use App\Interfaces\Dto\ModelDtoInterface;

class CreateTaskDto implements DtoInterface, ModelDtoInterface
{
    public function __construct(
        protected string $title,
        protected int $userId,
    ) {
    }

    public function toArray(): array
    {
        return get_object_vars($this);
    }

    public function toAttributesArray(): array
    {
        return [
            'title' => $this->getTitle(),
            'user_id' => $this->getUserId(),
        ];
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function setUserId(int $userId): self
    {
        $this->userId = $userId;

        return $this;
    }
}
