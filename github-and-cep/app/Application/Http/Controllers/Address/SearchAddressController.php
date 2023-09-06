<?php

namespace Application\Http\Controllers\Address;

use Application\Exceptions\BaseExcpetion;
use Application\Http\Controllers\Controller;
use Application\Http\Validations\Address\SearchAddressValidator;
use Domain\Address\Interfaces\Services\IAddressService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class SearchAddressController extends Controller
{
    public function __invoke(
        Request $request,
        IAddressService $addressService,
        SearchAddressValidator $validator
    )
    {
        try {
            $this->validate($request, $validator::getRules(), $validator::getMessages());

            $address = $addressService->getAddressByZipCode($request->get('zip_code'));

            return $this->response_ok($address, trans('default.address_exists'));
        } catch (ValidationException $exception) {
          send_log($exception->getMessage(), ['request' => $request->all()], 'info', $exception);

            return $this->response_fail(
                $exception->errors(),
                __('default.parameters_incorrect'),
                Response::HTTP_BAD_REQUEST
            );
        } catch (BaseExcpetion $exception) {
            send_log($exception->getMessage(), ['request' => $request->all()], 'info', $exception);
            return $this->response_fail([], $exception->getMessage(), $exception->getCode());
        } catch (\Exception $exception) {
            send_log($exception->getMessage(), ['request' => $request->all()], 'error', $exception);

            return $this->response_fail([], trans('default.internal_server_error'), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
