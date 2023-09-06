<?php

namespace Domain\Address\Interfaces\Services;

use Illuminate\Support\Collection;
use Shared\DTO\Address\CreateAddressDTO;

interface IAddressService
{
    /**
     * @param string $zipCode
     * @return Collection
     */
    public function getAddressByZipCode(string $zipCode): Collection;

    /**
     * @param CreateAddressDTO $createUserDto
     * @return Collection
     */
    public function createAddress(CreateAddressDTO $createUserDto): Collection;
}
