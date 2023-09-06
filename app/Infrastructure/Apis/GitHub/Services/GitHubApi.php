<?php

namespace Infrastructure\Apis\GitHub\Services;

use Application\Exceptions\Response\InvalidResponseException;
use Illuminate\Support\Collection;
use Infrastructure\Apis\BaseServiceApi;
use Infrastructure\Apis\GitHub\Interfaces\IGitHubApi;

class GitHubApi extends BaseServiceApi implements IGitHubApi
{
    public function __construct()
    {
        $this->setBaseUrl(config('custom.SERVICE_GITHUB_URL'));
    }

    /**
     * {@inheritDoc}
     */
    public function getUserByUsername(string $username): Collection
    {
        $response = $this->request('GET', "users/$username");

        if (!$response->get('success')) {
            throw new InvalidResponseException(trans("user_git_exception." . $response->get('code')));
        }

        return collect(json_decode($response, true));
    }
}
