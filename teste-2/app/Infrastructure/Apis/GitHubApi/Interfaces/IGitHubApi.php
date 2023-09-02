<?php

namespace Infrastructure\Apis\GitHubApi\Interfaces;

interface IGitHubApi
{
    /**
     * @param string $username
     * @return array
     */
    public function getUsuarioByUsername(string $username): array;
}
