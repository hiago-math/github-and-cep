<?php

namespace Domain\Users\Interfaces\Repositories;

use Illuminate\Support\Collection;
use Shared\DTO\Users\CreateUserDTO;

interface IUserRepository
{
    /**
     * @param string $login
     * @return Collection
     */
    public function findUserByLogin(string $login): Collection;

    /**
     * @param CreateUserDTO $createUserDto
     * @return Collection
     */
    public function createUser(CreateUserDTO $createUserDto): Collection;
}
