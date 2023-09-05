<?php

namespace Shared\DTO\Users;

use Carbon\Carbon;
use Shared\DTO\DTOAbstract;

class CreateUserDTO extends DTOAbstract
{
    /**
     * @var int
     */
    public int $github_id;

    /**
     * @var string
     */
    public string $name;

    /**
     * @var string
     */
    public string $login;

    /**
     * @var string|null
     */
    public ?string $company;

    /**
     * @var string|null
     */
    public ?string $bio;

    /**
     * @var string
     */
    public string $node_id;

    /**
     * @var string|null
     */
    public ?string $avatar_url;

    /**
     * @var string|null
     */
    public ?string $gravatar_id;

    /**
     * @var string
     */
    public string $url;

    /**
     * @var string
     */
    public string $html_url;

    /**
     * @var string
     */
    public string $type;

    /**
     * @var int
     */
    public int $public_repos;

    /**
     * @var int
     */
    public int $public_gists;

    /**
     * @var int
     */
    public int $followers;

    /**
     * @var int
     */
    public int $following;

    /**
     * @var string
     */
    public string $created_at_github;

    /**
     * @var string
     */
    public string $updated_at_github;

    /**
     * @param int $github_id
     * @param string $url
     * @param string $name
     * @param string $login
     * @param string $type
     * @param string $node_id
     * @param string $html_url
     * @param string $created_at_github
     * @param string $updated_at_github
     * @param string|null $bio
     * @param string|null $company
     * @param string|null $avatar_url
     * @param string $gravatar_id
     * @param int $public_repos
     * @param int $public_gists
     * @param int $followers
     * @param int $following
     * @return CreateUserDTO
     */
    public function register(
        int $github_id,
        string $url,
        string $login,
        string $type,
        string $node_id,
        string $html_url,
        string $created_at_github,
        string $updated_at_github,
        ?string $name= null,
        ?string $bio = null,
        ?string $company = null,
        ?string $avatar_url = null,
        ?string $gravatar_id = null,
        int $public_repos = 0,
        int $public_gists = 0,
        int $followers = 0,
        int $following = 0
    ): self
    {
        $this->github_id = $github_id;
        $this->name = $name ?? $login;
        $this->login = $login;
        $this->company = $company;
        $this->bio = $bio;
        $this->node_id = $node_id;
        $this->avatar_url = $avatar_url;
        $this->gravatar_id = $gravatar_id ?? "";
        $this->url = $url;
        $this->html_url = $html_url;
        $this->type = $type;
        $this->public_repos = $public_repos;
        $this->public_gists = $public_gists;
        $this->followers = $followers;
        $this->following = $following;
        $this->created_at_github = Carbon::parse($created_at_github)->format('Y/m/d H:i:s');
        $this->updated_at_github = Carbon::parse($updated_at_github)->format('Y/m/d H:i:s');

        return $this;
    }
}
