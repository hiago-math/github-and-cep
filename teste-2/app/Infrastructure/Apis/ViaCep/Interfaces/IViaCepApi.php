<?php

namespace Infrastructure\Apis\ViaCep\Interfaces;

use Illuminate\Support\Collection;

interface IViaCepApi
{
    /**
     * @param string $zipCode
     * @return Collection
     */
    public function getAddressByZipCode(string $zipCode): Collection;
}
