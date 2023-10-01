<?php

use Mazed\PHPValidator\Rules\UppercaseRule;

test('uppercase', function () {

    $rule = new UppercaseRule();

    expect(true)->toBe($rule->validate('HELLO WORLD!'));

});
