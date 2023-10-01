<?php

namespace Mazed\PHPValidator\Rules;

use Mazed\PHPValidator\Rule;

class JsonRule extends Rule
{
    private $message = "The :attribute must be a valid JSON string";

    public function validate($value)
    {
        json_decode($value);
        return json_last_error() === JSON_ERROR_NONE;
    }

    public function message()
    {
        return $this->message;
    }
}
