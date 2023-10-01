<?php

use Mazed\PHPValidator\Rules\MaxRule;

test('max', function () {

    $rule = new MaxRule();

    $paramKeys = ['max'];
    $paramValues = [5];

    $rule->setParameterValues($paramKeys, $paramValues);
    expect(true)->toBe($rule->validate('110'));
    expect(true)->toBe($rule->validate('passw'));
    // expect(true)->toBe($rule->setParameterValues($paramKeys, $paramValues)->validate([4, 5, 6]));

});
