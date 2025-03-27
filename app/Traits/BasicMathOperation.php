<?php

namespace App\Traits;

trait BasicMathOperation
{
    public function basicMathOperation(string $expression): bool
    {
        return preg_match('/^[-+]?(\d+(\.\d+)?)(\s*[-+\/\*]\s*[-+]?\d+(\.\d+)?)*$/', $expression);
    }
}
