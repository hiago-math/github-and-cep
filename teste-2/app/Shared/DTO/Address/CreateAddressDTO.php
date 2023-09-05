<?php

namespace Shared\DTO\Address;

use Shared\DTO\DTOAbstract;

class CreateAddressDTO extends DTOAbstract
{
    /**
     * @var string
     */
    public string $zip_code;

    /**
     * @var string
     */
    public string $public_place;

    /**
     * @var string|null
     */
    public ?string $complement;

    /**
     * @var string
     */
    public string $district;

    /**
     * @var string
     */
    public string $city;

    /**
     * @var string
     */
    public string $uf;

    /**
     * @var string|null
     */
    public ?string $ibge;

    /**
     * @var string|null
     */
    public ?string $gia;

    /**
     * @var string|null
     */
    public ?string $ddd;

    /**
     * @var string|null
     */
    public ?string $siafi;

    /**
     * @var bool
     */
    public bool $is_visible;

    /**
     * @param string $zip_code
     * @param string $public_place
     * @param string|null $complement
     * @param string $district
     * @param string $city
     * @param string $uf
     * @param string|null $ibge
     * @param string|null $gia
     * @param string|null $ddd
     * @param string|null $siafi
     * @return CreateAddressDTO
     */
    public function register(
        string $zip_code,
        string $public_place,
        string $district,
        string $city,
        string $uf,
        ?string $gia = null,
        ?string $ddd = null,
        ?string $ibge = null,
        ?string $siafi = null,
        ?string $complement = null
    ): self
    {
        $this->zip_code = remove_mask_zip_code($zip_code);
        $this->public_place = $public_place;
        $this->district = $district;
        $this->city = $city;
        $this->uf = $uf;
        $this->gia = !empty($gia) ? $gia : null;
        $this->ddd = !empty($ddd) ? $ddd : null;
        $this->ibge = !empty($ibge) ? $ibge : null;
        $this->siafi = !empty($siafi) ? $siafi : null;
        $this->complement = !empty($complement) ? $complement : null;
        $this->is_visible = true;

        return $this;
    }
}
