<?php

use Mazed\PHPValidator\Rules\DateRule;

test('date', function () {

    $rule = new DateRule();

    expect(true)->toBe($rule->validate('2023-01-19'));
});
