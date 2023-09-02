<?php

namespace Application\Http\Controllers\Usuarios;

use Application\Exceptions\BaseExcpetion;
use Domain\Usuarios\Interfaces\Services\IUsuarioService;
use Illuminate\Http\Request;

class BuscarUsuarioGitController
{
    public function __invoke(
        Request $request,
        IUsuarioService $usuarioService
    )
    {
        try {
            return $usuarioService->getUsuarioByUsername($request->get('username'));
        } catch (BaseExcpetion $exception) {
            dd($exception->getMessage());
        }

    }
}
