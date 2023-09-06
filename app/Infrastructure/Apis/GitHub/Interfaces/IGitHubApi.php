<?php

namespace Infrastructure\Apis\GitHub\Interfaces;

use Illuminate\Support\Collection;

interface IGitHubApi
{
    /**
     * @param string $username
     * @return Collection
     */
    public function getUserByUsername(string $username): Collection;
}
