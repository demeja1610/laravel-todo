<?php

namespace App\ValueObjects\Task;

use App\Enum\Task\TaskActionEnum;
use App\Interfaces\ValueObjects\ValueObjectInterface;

class TaskActionValueObject implements ValueObjectInterface
{
    protected int $id;
    protected string $url;
    protected string $name;
    protected string $method;
    protected ?string $icon = null;
    protected TaskActionEnum $action;
    protected ?bool $isPerformed = null;

    public function __construct(TaskActionEnum $action, int $id)
    {
        $this->id = $id;

        $this->action = $action;

        $this->fillObjectData();
    }

    public function toNative(): array
    {
        return [
            'url' => $this->getUrl(),
            'name' => $this->getName(),
            'icon' => $this->getIcon(),
            'method' => $this->getMethod(),
            'action' => $this->getAction()->value,
            'isPerformed' => $this->getIsPerformed(),
        ];
    }

    public function isSame(ValueObjectInterface $valueObject): bool
    {
        return $this->toNative() === $valueObject->toNative();
    }

    public function getAction(): TaskActionEnum
    {
        return $this->action;
    }

    public function setAction(TaskActionEnum $action): self
    {
        $this->action = $action;

        $this->fillObjectData();

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        $this->fillObjectData();

        return $this;
    }

    public function getIcon(): ?string
    {
        return $this->icon;
    }

    public function setIcon(string $icon): self
    {
        $this->icon = $icon;

        return $this;
    }

    public function getIsPerformed(): ?bool
    {
        return $this->isPerformed;
    }

    public function setIsPerformed(?bool $isPerformed): self
    {
        $this->isPerformed = $isPerformed;

        return $this;
    }

    protected function fillObjectData(): self
    {
        $this->fillName()
            ->fillUrlAndMethod();

        return $this;
    }

    protected function fillName(): self
    {
        $this->name = __("task.actions.{$this->getAction()->value}");

        return $this;
    }

    protected function fillUrlAndMethod(): self
    {
        switch ($this->getAction()) {
            case TaskActionEnum::DELETE:
                $this->url = route('tasks.delete', ['id' => $this->getId()]);
                $this->method = 'DELETE';
                break;
            case TaskActionEnum::RESTORE:
                $this->url = route('tasks.restore', ['id' => $this->getId()]);
                $this->method = 'POST';
                break;
            case TaskActionEnum::COMPLETE:
                $this->url =  route('tasks.complete', ['id' => $this->getId()]);
                $this->method = 'POST';
                break;
            case TaskActionEnum::FAVORITE:
                $this->url =  route('tasks.favorite', ['id' => $this->getId()]);
                $this->method = 'POST';
                break;
        }

        return $this;
    }
}
