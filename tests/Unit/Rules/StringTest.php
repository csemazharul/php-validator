<?php

use Mazed\PHPValidator\Rules\StringRule;

test('string', function () {

    $rule = new StringRule();

    expect(true)->toBe($rule->validate('Hello, World !'));
    expect(true)->toBe($rule->validate('1'));

});
