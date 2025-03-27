<?php

namespace App\Services;

use Illuminate\Console\Command;

class CalculatorInteractiveService
{
    public function __construct(protected CalculatorService $calculatorService){}


    public function run(Command $command): void
    {
        $command->info("Enter `exit` to exit the CLI");

        while (true) {
            $expression = $command->ask("Enter formula (e.g., '1 + 1', '4 sqrt')");
            if (strtolower($expression) === 'exit') {
                $command->info("Goodbye!");
                break;
            }

            $result = $this->calculatorService->execute($expression);

            if ($result === false) {
                $command->error('Invalid expression. Use format like "10 + 4" or "9 sqrt".');
            } else {
                $command->info("Result: $result");
            }
        }
    }
}
