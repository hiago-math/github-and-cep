<?php

namespace Domain\Users\Services;

use Domain\Users\Interfaces\Repositories\IUserRepository;
use Domain\Users\Interfaces\Services\IUserService;
use Illuminate\Support\Collection;
use Infrastructure\Apis\GitHub\Interfaces\IGitHubApi;
use Shared\DTO\Users\CreateUserDTO;

class UserService implements IUserService
{
    public IGitHubApi $gitHubApi;
    public IUserRepository $userRepository;
    public CreateUserDTO $createUserDto;

    /**
     * UserService constructor.
     * @param IGitHubApi $gitHubApi
     * @param CreateUserDTO $createUserDto
     * @param IUserRepository $userRepository
     */
    public function __construct(
        IGitHubApi $gitHubApi,
        CreateUserDTO $createUserDto,
        IUserRepository $userRepository
    )
    {
        $this->gitHubApi = $gitHubApi;
        $this->createUserDto = $createUserDto;
        $this->userRepository = $userRepository;
    }

    /**
     * @param string $username
     * @return Collection
     */
    public function getUserByUsername(string $username): Collection
    {
        $user = $this->userRepository->getUserByLogin($username);

        if($user->isEmpty()) {
            $user = $this->gitHubApi->getUserByUsername($username);
            $newCreateUserDto = $this->prepareCreateUserDtoByResponse($user);
            $user = $this->createUser($newCreateUserDto);
        }

        return collect($user);
    }

    /**
     * @param CreateUserDTO $createUserDto
     * @return Collection
     */
    public function createUser(CreateUserDTO $createUserDto): Collection
    {
        return $this->userRepository->createUser($this->createUserDto);
    }

    private function prepareCreateUserDtoByResponse(Collection $userBygithub)
    {
        return $this->createUserDto->register(
            $userBygithub->get('id'),
            $userBygithub->get('url'),
            $userBygithub->get('login'),
            $userBygithub->get('type'),
            $userBygithub->get('node_id'),
            $userBygithub->get('html_url'),
            $userBygithub->get('created_at'),
            $userBygithub->get('updated_at'),
            $userBygithub->get('name'),
            $userBygithub->get('bio'),
            $userBygithub->get('company'),
            $userBygithub->get('avatar_url'),
            $userBygithub->get('gravatar_uid'),
            $userBygithub->get('public_repos'),
            $userBygithub->get('public_gists'),
            $userBygithub->get('followers'),
            $userBygithub->get('following')
        );
    }
}
