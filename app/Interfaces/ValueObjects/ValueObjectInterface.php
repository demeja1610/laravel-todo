<?php

namespace App\Interfaces\ValueObjects;

interface ValueObjectInterface
{
    public function toNative();

    public function isSame(ValueObjectInterface $valueObject): bool;
}
