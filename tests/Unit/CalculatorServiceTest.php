<?php

namespace Tests\Unit;

use App\Services\CalculatorService;
use PHPUnit\Framework\TestCase;

class CalculatorServiceTest extends TestCase
{
    protected CalculatorService $calculatorService;

    public function setUp(): void
    {
        parent::setUp();
        $this->calculatorService = new CalculatorService();
    }

    public function test_addition()
    {
        $this->assertEquals(4, $this->calculatorService->execute('2 + 2'));
    }

    public function test_subtraction()
    {
        $this->assertEquals(3, $this->calculatorService->execute('5 - 2'));
    }

    public function test_multiplication()
    {
        $this->assertEquals(10, $this->calculatorService->execute('2 * 5'));
    }

    public function test_division()
    {
        $this->assertEquals(5, $this->calculatorService->execute('10 / 2'));
    }

    public function test_square_root()
    {
        $this->assertEquals(3, $this->calculatorService->execute('9 sqrt'));
    }

    public function test_invalid_expression()
    {
        $this->assertFalse($this->calculatorService->execute('invalid expression'));
    }

    public function test_division_by_zero()
    {
        $this->assertFalse($this->calculatorService->execute('10 / 0'));
    }
}
