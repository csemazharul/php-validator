<?php

namespace Mazed\PHPValidator\Rules;

use Mazed\PHPValidator\Rule;

class StringRule extends Rule
{
    protected $message = "The :attribute field should be string";

    protected static $attribute;

    public function validate($value)
    {
        return is_string($value);
    }

    public function message()
    {
        return str_replace(":attribute", static::$attribute, $this->message);
    }
}
