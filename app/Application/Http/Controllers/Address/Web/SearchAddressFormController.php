<?php

namespace Application\Http\Controllers\Address\Web;

use Application\Exceptions\BaseExcpetion;
use Application\Http\Controllers\Controller;
use Application\Http\Validations\Address\SearchAddressValidator;
use Domain\Address\Interfaces\Services\IAddressService;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SearchAddressFormController extends Controller
{
    public function __invoke(
        Request $request,
        IAddressService $addressService,
        SearchAddressValidator $searchAddressValidator
    )
    {
        try {
            $this->validate($request, $searchAddressValidator::getRules(), $searchAddressValidator::getMessages());

            $addressService->getAddressByZipCode($request->get('zip_code'));

            return redirect()->back();
        } catch (ValidationException $exception) {

            return redirect()->back()->withInput()->withErrors(prepare_errors_validators($exception->errors()));
        } catch (BaseExcpetion $exception) {
            return redirect()->back()->withInput()->withErrors(['erro' => $exception->getMessage()]);
        } catch (\Exception $exception) {

            return redirect()->back()->withInput()->withErrors(['erro' => $exception->getMessage()]);
        }

    }
}
