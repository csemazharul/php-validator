<?php
namespace Mazed\PHPValidator\Rules;

use Mazed\PHPValidator\Rule;

class RequiredRule extends Rule
{
    private $message = 'The :attribute field is required';

    public function validate($value)
    {
        return !empty($value);
    }

    public function message()
    {
        return $this->message;
    }
}
