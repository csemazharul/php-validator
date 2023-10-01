<?php
namespace Mazed\PHPValidator\Rules;

use Mazed\PHPValidator\Rule;

class DateRule extends Rule
{
    private $message = "The :attribute is not a valid date";

    public function validate($value)
    {
        return strtotime($value) !== false;
    }

    public function message()
    {
        return $this->message;
    }
}
