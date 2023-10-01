<?php
namespace Mazed\PHPValidator\Rules;

use Mazed\PHPValidator\Rule;

class UrlRule extends Rule
{
    private $message = "The :attribute format is invalid";

    public function validate($value)
    {
        return filter_var($value, FILTER_VALIDATE_URL) !== false;
    }

    public function message()
    {
        return $this->message;
    }
}
