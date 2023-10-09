<?php
namespace Mazed\PHPValidator;

trait SanitizationMethods
{
    protected function sanitizeTrim($value, $params = [])
    {
        return is_string($value) ? trim($value) : $value;
    }

    protected function sanitizeEscape($value, $params = [])
    {
        return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');

    }

    protected function sanitizeCapitalize($value, $params = [])
    {
        return ucwords(strtolower($value));
    }

}
