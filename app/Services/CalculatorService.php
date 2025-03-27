<?php

namespace App\Services;

use App\Traits\BasicMathOperation;
use App\Traits\SquareRoot;

class CalculatorService
{
    use SquareRoot, BasicMathOperation;
    public function execute(string $expression): int | bool
    {
        $expression = trim($expression);

        $sqrtResult  = $this->executeSquareRoot($expression);

        if ($sqrtResult  !== false) {
            return $sqrtResult ;
        }

        if (!$this->basicMathOperation($expression)) {
            return false;
        }

        try {
            return eval("return $expression;");
        } catch (\Throwable $e) {
            return false;
        }
    }
}
