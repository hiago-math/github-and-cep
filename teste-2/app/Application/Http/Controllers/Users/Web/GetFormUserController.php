<?php

namespace Application\Http\Controllers\Users\Web;

use Application\Http\Controllers\Controller;

class GetFormUserController extends Controller
{
    public function __invoke()
    {
        return view('user.get-user');
    }
}
