<?php
namespace Mazed\PHPValidator\Rules;

use Mazed\PHPValidator\Rule;

class EmailRule extends Rule
{
    private $message = "The :attribute must be a valid email address";

    public function validate($value)
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL) !== false;
    }

    public function message()
    {
        return $this->message;
    }
}
