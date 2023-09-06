<?php

namespace Application\Http\Controllers\Address\Web;

use Application\Http\Controllers\Controller;
use Domain\Address\Interfaces\Repositories\IAddressRepository;

class ListAddressFormController extends Controller
{
    public function __invoke(
        IAddressRepository $addressRepository
    )
    {
        $dados = $addressRepository->getAll();

        return view('address.list-address', compact('dados'));
    }
}
