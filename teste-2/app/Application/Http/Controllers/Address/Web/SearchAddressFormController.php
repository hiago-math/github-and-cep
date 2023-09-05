<?php

namespace Application\Http\Controllers\Address\Web;

use Application\Exceptions\BaseExcpetion;
use Application\Http\Controllers\Controller;
use Domain\Address\Interfaces\Services\IAddressService;
use Illuminate\Http\Request;

class SearchAddressFormController extends Controller
{
    public function __invoke(
        Request $request,
        IAddressService $addressService
    )
    {
        try {
            $addressService->getAddressByZipCode($request->get('zip_code'));
            return redirect()->back();
        } catch (BaseExcpetion $exception) {
            return redirect()->back()->withInput()->withErrors(['erro' => $exception->getMessage()]);
        } catch (\Exception $exception) {

            return redirect()->back()->withInput()->withErrors(['erro' => $exception->getMessage()]);
        }

    }
}
