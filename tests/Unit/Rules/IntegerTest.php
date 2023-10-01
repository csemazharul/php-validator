<?php

use Mazed\PHPValidator\Rules\IntegerRule;

test('integer', function () {

    $rule = new IntegerRule();

    expect(true)->toBe($rule->validate(-123));
    expect(true)->toBe($rule->validate(1000));
    expect(true)->toBe($rule->validate(0));

});
