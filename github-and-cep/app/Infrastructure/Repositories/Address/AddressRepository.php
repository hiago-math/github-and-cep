<?php

namespace Infrastructure\Repositories\Address;

use Domain\Address\Interfaces\Repositories\IAddressRepository;
use Illuminate\Support\Collection;
use Infrastructure\Models\Address;
use Infrastructure\Repositories\RepositoryAbstract;
use Shared\DTO\Address\CreateAddressDTO;

class AddressRepository extends RepositoryAbstract implements IAddressRepository
{

    public function __construct()
    {
        parent::__construct(Address::class);
    }

    /**
     * @param string $zipCode
     * @return Collection
     */
    public function findAddressByZipcode(string $zipCode): Collection
    {
        $address = $this->getModel()
            ->where('zip_code', $zipCode)
            ->where('is_visible', true)
            ->first()
            ?->toArray() ?? [];

        return $this->toCollect($address);
    }

    /**
     * @param CreateAddressDTO $addressDto
     * @return Collection
     */
    public function createAddress(CreateAddressDTO $addressDto): Collection
    {
        $addressCreated = $this->getModel()
            ->updateOrCreate(
                [
                    'zip_code' => $addressDto->zip_code
                ],
                $addressDto->toArray()
            );


        return $this->toCollect($addressCreated->toArray());
    }

    /**
     * @return Collection
     */
    public function getAll(): Collection
    {
        $allAddress = $this->getModel()
            ->select([
                'zip_code',
                'public_place',
                'district',
                'city',
                'uf',
            ])
            ->where('is_visible', true)
            ->orderBy('created_at', 'desc')
            ->get()
            ->toArray();

        return $this->toCollect($allAddress);
    }

    public function cleanAll(): bool
    {
        return $this->getModel()
            ->query()
            ->update([
                'is_visible' => false
            ]);
    }
}
