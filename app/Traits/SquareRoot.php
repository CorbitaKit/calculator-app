<?php

namespace App\Traits;

trait SquareRoot
{
    public function executeSquareRoot(string $expression): int | float | bool
    {

        if (preg_match('/^(\d+(\.\d+)?)\s*sqrt$/', $expression, $matches)) {
            $number = (float) $matches[1];
            return ($number >= 0) ? sqrt($number) : false;
        }
        return false;
    }
}
