<?php
namespace Mazed\PHPValidator\Rules;

use Mazed\PHPValidator\Rule;

class LowercaseRule extends Rule
{
    private $message = "The :attribute must be in lowercase";

    public function validate($value)
    {
        return $value === strtolower($value);
    }

    public function message()
    {
        $this->message;
    }
}
