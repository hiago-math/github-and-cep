<?php

namespace Application\Http\Controllers\Address;

use Application\Http\Controllers\Controller;
use Domain\Address\Interfaces\Repositories\IAddressRepository;
use Illuminate\Http\Response;

class ListAddressController extends Controller
{
    public function __invoke(
        IAddressRepository $addressRepository
    )
    {
        try {

            $address = $addressRepository->getAll();
            if ($address->isEmpty()) {
                return $this->response_fail([], trans('default.process_empty'), Response::HTTP_OK);
            }

            return $this->response_ok($address, trans('default.process_ok'));
        } catch (\Exception $exception) {
            send_log($exception->getMessage(), [], 'error', $exception);

            return $this->response_fail([], trans('default.internal_server_error'), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
