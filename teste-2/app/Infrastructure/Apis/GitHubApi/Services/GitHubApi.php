<?php

namespace Infrastructure\Apis\GitHubApi\Services;

use Infrastructure\Apis\BaseServiceApi;
use Infrastructure\Apis\GitHubApi\Interfaces\IGitHubApi;

class GitHubApi extends BaseServiceApi implements IGitHubApi
{
    public function __construct()
    {
        $this->setBaseUrl(config('custom.SERVICE_GITHUB_URL'));
    }

    /**
     * @param string $username
     * @return array
     */
    public function getUsuarioByUsername(string $username): array
    {
        $response = $this->request('GET', "users/$username");

        return json_decode($response, true);
    }
}
