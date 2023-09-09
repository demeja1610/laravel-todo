<?php

namespace App\Repositories\Task;

use Illuminate\Database\Eloquent\Builder;
use App\Interfaces\Specifiers\SpecifierInterface;

final class TaskRepositorySpecifier implements SpecifierInterface
{
    protected ?array $id = null;
    protected ?array $userId = null;
    protected ?bool $completed = null;

    protected ?string $orderBy = null;
    protected ?string $ordeDirection = null;

    protected ?Builder $query = null;

    protected bool $withTrashed = false;

    public function apply(Builder $query): Builder
    {
        $this->query = $query;

        $this->applyFilters();

        $this->applyOrder();

        $this->applyWithTrashed();

        return $this->query;
    }

    /**
     * @return null|int|array<int>
     */
    public function getId(): null|int|array
    {
        return $this->id === null || count($this->id) > 1
            ? $this->id
            : $this->id[0];
    }

    public function setId(int ...$ids): self
    {
        $this->id = empty(array_filter(array: $ids, callback: fn ($item) => $item !== null))
            ? null
            : $ids;

        return $this;
    }

    /**
     * @return null|int|array<int>
     */
    public function getUserId(): null|int|array
    {
        return $this->userId === null || count($this->userId) > 1
            ? $this->userId
            : $this->userId[0];
    }

    public function setUserId(int ...$userIds): self
    {
        $this->userId = empty(array_filter(array: $userIds, callback: fn ($item) => $item !== null))
            ? null
            : $userIds;

        return $this;
    }

    public function getCompleted(): ?bool
    {
        return $this->completed;
    }

    public function setCompleted(?bool $completed): self
    {
        $this->completed = $completed;

        return $this;
    }

    public function getWithTrashed(): bool
    {
        return $this->withTrashed;
    }

    public function setWithTrashed(bool $withTrashed): self
    {
        $this->withTrashed = $withTrashed;

        return $this;
    }

    public function getOrderBy(): ?string
    {
        return $this->orderBy;
    }

    public function setOrderBy(?string $orderBy): self
    {
        $this->orderBy = $orderBy;

        return $this;
    }

    public function getOrdeDirection(): ?string
    {
        return $this->ordeDirection;
    }

    public function setOrdeDirection(?string $ordeDirection): self
    {
        $this->ordeDirection = $ordeDirection;

        return $this;
    }

    protected function applyFilters(): self
    {
        $this->applyIdFilter()
            ->applyUserFilter()
            ->applyCompletedFilter();

        return $this;
    }

    protected function applyIdFilter(): self
    {
        if ($this->getId()) {
            is_array($this->getId())
                ? $this->query->whereIn('id', $this->getId())
                : $this->query->where('id', $this->getId());
        }

        return $this;
    }

    protected function applyUserFilter(): self
    {
        if ($this->getUserId()) {
            is_array($this->getId())
                ? $this->query->whereIn('user_id', $this->getUserId())
                : $this->query->where('user_id', $this->getUserId());
        }

        return $this;
    }

    protected function applyCompletedFilter(): self
    {
        if ($this->getCompleted() !== null) {
            if ($this->getCompleted()) {
                $this->query->whereNotNull('completed_at');
            } else {
                $this->query->whereNull('completed_at');
            }
        }

        return $this;
    }

    protected function applyOrder(): self
    {
        if ($this->getOrderBy() !== null) {
            $this->query->orderBy($this->getOrderBy(), $this->getOrdeDirection() ?? 'desc');
        }

        return $this;
    }

    protected function applyWithTrashed(): self
    {
        if ($this->getWithTrashed() === true) {
            $this->query->withTrashed();
        }

        return $this;
    }
}
