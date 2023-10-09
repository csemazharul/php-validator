<?php

use Mazed\PHPValidator\InputDataContainer;
use Mazed\PHPValidator\Rules\SameRule;

test('same', function () {

    $rule = new SameRule();
    $paramKeys = ['other'];
    $paramValues = ['confirm_password'];

    $data = [
        'confirm_password' => '12345',
    ];

    $rule->setParameterValues($paramKeys, $paramValues);

    $rule->setInputDataContainer(new InputDataContainer($data));

    expect(true)->toBe($rule->validate('12345'));
});
