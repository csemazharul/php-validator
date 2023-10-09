<?php
namespace Mazed\PHPValidator\Rules;

use Mazed\PHPValidator\Helpers;
use Mazed\PHPValidator\Rule;

class RequiredRule extends Rule
{
    use Helpers;

    private $message = 'The :attribute field is required';

    public function validate($value)
    {
        return !$this->isEmpty($value);
    }

    public function message()
    {
        return $this->message;
    }
}
