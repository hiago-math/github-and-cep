<?php

namespace Application\Http\Controllers\Usuarios;

use Domain\Usuarios\Interfaces\Services\IUsuarioService;
use Illuminate\Http\Request;

class BuscarUsuarioGitController
{
    public function __invoke(
        Request $request,
        IUsuarioService $usuarioService
    )
    {
        return $usuarioService->getUsuarioByUsername($request->get('username'));
    }
}
