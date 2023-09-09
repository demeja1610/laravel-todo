<?php

namespace App\Interfaces\Dto;

use App\Interfaces\Dto\DtoInterface;

interface ModelDtoInterface extends DtoInterface
{
    public function toAttributesArray(): array;
}
