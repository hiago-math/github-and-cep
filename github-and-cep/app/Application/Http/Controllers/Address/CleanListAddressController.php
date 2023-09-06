<?php

namespace Application\Http\Controllers\Address;

use Application\Exceptions\BaseExcpetion;
use Application\Http\Controllers\Controller;
use Domain\Address\Interfaces\Repositories\IAddressRepository;

class CleanListAddressController extends Controller
{
    public function __invoke(IAddressRepository $addressRepository)
    {
        try {
            $addressRepository->cleanAll();
        } catch (BaseExcpetion $exception) {
            return redirect()->back()->withInput()->withErrors(['erro' => $exception->getMessage()]);
        } catch (\Exception $exception) {

            return redirect()->back()->withInput()->withErrors(['erro' => $exception->getMessage()]);
        }
    }
}
