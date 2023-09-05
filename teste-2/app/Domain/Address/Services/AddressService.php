<?php

namespace Domain\Address\Services;

use Domain\Address\Interfaces\Repositories\IAddressRepository;
use Domain\Address\Interfaces\Services\IAddressService;
use Illuminate\Support\Collection;
use Infrastructure\Apis\ViaCep\Interfaces\IViaCepApi;
use Shared\DTO\Address\CreateAddressDTO;

class AddressService implements IAddressService
{
    private IViaCepApi $viaCepApi;
    private IAddressRepository $addressRepository;
    private CreateAddressDTO $createAddressDto;

    /**
     * AddressService constructor.
     * @param IViaCepApi $viaCepApi
     * @param CreateAddressDTO $createAddressDto
     * @param IAddressRepository $addressRepository
     */
    public function __construct(
        IViaCepApi $viaCepApi,
        CreateAddressDTO $createAddressDto,
        IAddressRepository $addressRepository
    )
    {
        $this->viaCepApi = $viaCepApi;
        $this->createAddressDto = $createAddressDto;
        $this->addressRepository = $addressRepository;
    }


    /**
     * {@inheritDoc}
     */
    public function getAddressByZipCode(string $zipCode): Collection
    {
        $address = $this->addressRepository->findAddressByZipcode($zipCode);

        if ($address->isEmpty()) {
            $address = $this->viaCepApi->getAddressByZipCode($zipCode);
            $newCreateAddressDto = $this->prepareCreateAddressDtoByResponse($address);
            $address = $this->createAddress($newCreateAddressDto);
        }

        return $address;
    }

    /**
     * {@inheritDoc}
     */
    public function createAddress(CreateAddressDTO $createUserDto): Collection
    {
       return $this->addressRepository->createAddress($createUserDto);
    }

    /**
     * @param Collection $response
     * @return CreateAddressDTO
     */
    private function prepareCreateAddressDtoByResponse(Collection $response): CreateAddressDTO
    {
        return $this->createAddressDto->register(
            $response->get('cep'),
            $response->get('logradouro'),
            $response->get('bairro'),
            $response->get('localidade'),
            $response->get('uf'),
            $response->get('gia'),
            $response->get('ddd'),
            $response->get('ibge'),
            $response->get('siafi'),
            $response->get('complemento')
        );
    }

    /**
     * @param string $zipCode
     * @return Collection
     */
    public function getAddress(): Collection
    {
        // TODO: Implement getAddress() method.
    }
}
