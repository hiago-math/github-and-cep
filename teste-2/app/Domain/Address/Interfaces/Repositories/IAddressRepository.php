<?php

namespace Domain\Address\Interfaces\Repositories;

use Illuminate\Support\Collection;
use Shared\DTO\Address\CreateAddressDTO;

interface IAddressRepository
{
    /**
     * @param string $zipCode
     * @return Collection
     */
    public function findAddressByZipcode(string $zipCode): Collection;

    /**
     * @param CreateAddressDTO $addressDto
     * @return Collection
     */
    public function createAddress(CreateAddressDTO $addressDto): Collection;

    /**
     * @return Collection
     */
    public function getAll(): Collection;

    /**
     * @return Collection
     */
    public function cleanAll(): bool;
}
