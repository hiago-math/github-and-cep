<?php

namespace Application\Http\Controllers\Users;

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
            return $this->response_ok($user, trans('default.user_exists'));
        } catch (BaseExcpetion $exception) {
            send_log($exception->getMessage(), ['request' => $request->all()], 'info', $exception);
            return $this->response_fail([], $exception->getMessage(), $exception->getCode());
        } catch (\Exception $exception) {
            send_log($exception->getMessage(), ['request' => $request->all()], 'error',$exception);

            return $this->response_fail([], trans('default.internal_server_error'), Response::HTTP_INTERNAL_SERVER_ERROR);
        }

    }
}
