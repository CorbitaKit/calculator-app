<?php

namespace App\Services;

class CalculatorService
{
    public function execute(string $expression): int | bool
    {
        $expression = trim($expression);

        if (preg_match('/^(\d+(\.\d+)?)\s*sqrt$/', $expression, $matches)) {
            $number = (float) $matches[1];
            return ($number >= 0) ? sqrt($number) : false;
        }

        if (!preg_match('/^[-+]?(\d+(\.\d+)?)(\s*[-+\/\*]\s*[-+]?\d+(\.\d+)?)*$/', $expression)) {
            return false;
        }
        try {
            return eval("return $expression;");
        } catch (\Throwable $e) {
            return false;
        }
    }
}
