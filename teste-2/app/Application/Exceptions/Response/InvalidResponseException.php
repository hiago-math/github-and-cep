<?php

namespace Application\Exceptions\Response;

use Application\Exceptions\BaseExcpetion;
use Throwable;

class InvalidResponseException extends BaseExcpetion
{
    public function __construct($code = 0, Throwable $previous = null)
    {
        $message = trans("exception.$code");
        parent::__construct($message, $code, $previous);
    }


}
