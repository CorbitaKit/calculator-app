<?php

namespace Tests\Unit;

use App\Services\CalculatorInteractiveService;
use App\Services\CalculatorService;
use Illuminate\Console\Command;
use Mockery;
use Tests\TestCase;

class CalculatorInteractiveServiceTest extends TestCase
{
    public function test_run_handles_valid_and_invalid_expressions()
    {
        $calculatorService = Mockery::mock(CalculatorService::class);
        $command = Mockery::mock(Command::class);

        $calculatorService->shouldReceive('execute')
            ->with('1 + 1')->andReturn(2);

        $calculatorService->shouldReceive('execute')
            ->with('invalid')->andReturn(false);

        $command->shouldReceive('info')->once()->with("Enter `exit` to exit the CLI");

        $command->shouldReceive('ask')->times(3)->andReturn('1 + 1', 'invalid', 'exit');

        $command->shouldReceive('info')->once()->with('Result: 2');
        $command->shouldReceive('error')->once()->with('Invalid expression. Use format like "10 + 4" or "9 sqrt".');
        $command->shouldReceive('info')->once()->with("Goodbye!");

        $service = new CalculatorInteractiveService($calculatorService);

        $service->run($command);
    }
}
