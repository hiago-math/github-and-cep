<?php

namespace Application\Http\Validations;

abstract class BaseValidatorAbstract
{
    protected static array $rules = [];

    protected static array $messages = [];

    /**
     * @return array
     */
    public static function getRules()
    {
        return self::$rules;
    }

    /**
     * @return array
     */
    public static function getMessages()
    {
        return self::$messages;
    }


}
