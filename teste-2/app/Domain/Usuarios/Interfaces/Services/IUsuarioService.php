<?php

namespace Domain\Usuarios\Interfaces\Services;

use Illuminate\Support\Collection;

interface IUsuarioService
{
    /**
     * @param string $username
     * @return Collection
     */
    public function getUsuarioByUsername(string $username): Collection;
}
