<?php

namespace Infrastructure\Repositories\Users;

use Domain\Users\Interfaces\Repositories\IUserRepository;
use Illuminate\Support\Collection;
use Infrastructure\Models\User;
use Infrastructure\Repositories\RepositoryAbstract;
use Shared\DTO\Users\CreateUserDTO;

class UserRepository extends RepositoryAbstract implements IUserRepository
{
    public function __construct()
    {
        parent::__construct(User::class);
    }

    /**
     * {@inheritDoc}
     */
    public function findUserByLogin(string $login): Collection
    {
        $user = $this->getModel()
                ->where('login', $login)
                ->first()
                ?->toArray() ?? [];

        return $this->toCollect($user);
    }

    /**
     * {@inheritDoc}
     */
    public function createUser(CreateUserDTO $createUserDto): Collection
    {
        $userCreated = $this->getModel()
            ->firstOrCreate(
            [
                'login' => $createUserDto->login
            ],
            $createUserDto->toArray()
        );


        return $this->toCollect($userCreated->toArray());
    }
}
