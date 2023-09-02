<?php

namespace Infrastructure\Repositories\Usuarios;

use Domain\Usuarios\Interfaces\Repositories\IUsuarioRepository;
use Infrastructure\Models\Usuario;
use Infrastructure\Repositories\RepositoryAbstract;

class UsuarioRepository extends RepositoryAbstract implements IUsuarioRepository
{
    public function __construct()
    {
        parent::__construct(Usuario::class);
    }
}
