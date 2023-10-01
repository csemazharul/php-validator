<?php
namespace Mazed\PHPValidator\Rules;

use Mazed\PHPValidator\Rule;

class NullableRule extends Rule
{
    public function validate($value)
    {
        return true;
    }

    public function skipRule()
    {
        return false;
    }

    public function message(){
        return ''; 
    }
}
