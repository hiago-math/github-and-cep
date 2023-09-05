<?php

namespace Domain\Users\Interfaces\Services;

use Illuminate\Support\Collection;
use Shared\DTO\Users\CreateUserDTO;

interface IUserService
{
    /**
     * @param string $username
     * @return Collection
     */
    public function getUserByUsername(string $username): Collection;

    /**
     * @param CreateUserDTO $createUserDto
     * @return Collection
     */
    public function createUser(CreateUserDTO $createUserDto): Collection;
}
