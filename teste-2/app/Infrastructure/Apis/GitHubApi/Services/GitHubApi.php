<?php

namespace Infrastructure\Apis\GitHubApi\Services;

use Application\Exceptions\Response\InvalidResponseException;
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

        if(!$response->get('success')) {
            throw new InvalidResponseException($response->get('code'));
        }

        return json_decode($response, true);
    }
}
