<?php
namespace Mazed\PHPValidator\Rules;

use Mazed\PHPValidator\Helpers;
use Mazed\PHPValidator\Rule;

class MinRule extends Rule
{
    use Helpers;

    private $message = "The :attribute must be at least :min characters";

    protected $requireParameters = ['min'];

    public function validate($value)
    {
        $this->checkRequiredParameter($this->requireParameters);

        $min = (int) $this->getParameter('min');

        $length = $this->getValueLength($value);

        if ($length) {
            return $length >= $min;
        }

        return false;

    }

    public function getParamKeys()
    {
        return $this->requireParameters;
    }

    public function message()
    {
        return $this->message;
    }
}
