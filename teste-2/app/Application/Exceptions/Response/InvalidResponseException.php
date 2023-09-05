<?php

namespace Application\Exceptions\Response;

use Application\Exceptions\BaseExcpetion;
use Throwable;

class InvalidResponseException extends BaseExcpetion
{
    public function __construct($message,$code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }


}
