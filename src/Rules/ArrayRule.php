<?php
namespace Mazed\PHPValidator\Rules;

use Mazed\PHPValidator\Rule;

class ArrayRule extends Rule
{
    private $message = "The :attribute must be array";

    public function validate($value)
    {
        return is_array($value);
    }

    public function message()
    {
        return $this->message;
    }
}
