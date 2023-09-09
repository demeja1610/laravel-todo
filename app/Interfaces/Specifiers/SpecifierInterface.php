<?php

namespace App\Interfaces\Specifiers;

use Illuminate\Database\Eloquent\Builder;

interface SpecifierInterface
{
    public function apply(Builder $query): Builder;
}
