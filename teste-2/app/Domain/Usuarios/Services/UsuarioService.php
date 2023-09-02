<?php

namespace Domain\Usuarios\Services;

use Domain\Usuarios\Interfaces\Repositories\IUsuarioRepository;
use Domain\Usuarios\Interfaces\Services\IUsuarioService;
use Illuminate\Support\Collection;
use Infrastructure\Apis\GitHubApi\Interfaces\IGitHubApi;

class UsuarioService implements IUsuarioService
{
    public IGitHubApi $gitHubApi;
    public IUsuarioRepository $usuarioRepository;

    /**
     * UsuarioService constructor.
     * @param IGitHubApi $gitHubApi
     * @param IUsuarioRepository $usuarioRepository
     */
    public function __construct(IGitHubApi $gitHubApi, IUsuarioRepository $usuarioRepository)
    {
        $this->gitHubApi = $gitHubApi;
        $this->usuarioRepository = $usuarioRepository;
    }

    /**
     * @param string $username
     * @return Collection
     */
    public function getUsuarioByUsername(string $username): Collection
    {
        $response  = $this->gitHubApi->getUsuarioByUsername($username);
        return collect($response);
    }
}
