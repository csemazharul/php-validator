<?php
namespace Mazed\PHPValidator\Rules;

use Mazed\PHPValidator\Rule;

class IntegerRule extends Rule
{
    private $message = "The :attribute must be an integer";

    public function validate($value)
    {
        return filter_var($value, FILTER_VALIDATE_INT) !== false;
    }

    public function message()
    {
        return $this->message;
    }

}
