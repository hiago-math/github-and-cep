<?php

namespace Application\Http\Controllers\Users\Web;

use Application\Exceptions\BaseExcpetion;
use Application\Http\Controllers\Controller;
use Domain\Users\Interfaces\Services\IUserService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SearchUserController extends Controller
{
    public function __invoke(
        Request $request,
        IUserService $userService
    )
    {
        try {
           $user = $userService->getUserByUsername($request->get('login'));
           return view('user.info-user', compact('user'));
        } catch (BaseExcpetion $exception) {
            return redirect()->back()->withInput()->withErrors(['erro' => $exception->getMessage()]);
        } catch (\Exception $exception) {

            return redirect()->back()->withInput()->withErrors(['erro' => $exception->getMessage()]);
        }

    }
}
