<?php

namespace Application\Http\Validations\Address;

use Application\Http\Validations\BaseValidatorAbstract;

class SearchAddressValidator extends BaseValidatorAbstract
{
    public function __construct()
    {
        parent::$rules = [
            'zip_code' => ['required', 'max:9']
        ];

        parent::$messages = [
            'zip_code.required' => __('validation.required', ['attribute' => 'zip_code']),
            'zip_code.max' => __('validation.max', ['attribute' => 'CEP', 'int' => 9])
        ];
    }
}
