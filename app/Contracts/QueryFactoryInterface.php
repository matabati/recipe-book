<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Builder;

interface QueryFactoryInterface
{
    public function createQuery(): Builder;
}