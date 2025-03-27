<?php

namespace App\Console\Commands;

use App\Services\CalculatorInteractiveService;
use App\Services\CalculatorService;
use Illuminate\Console\Command;

class Calculate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'run:calculator';



    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Calculator App, exam for Buink: Senior full stack developer";

    /**
     * Execute the console command.
     */

     public function __construct(protected CalculatorInteractiveService $calculatorInteractiveService){
        parent::__construct();
     }
    public function handle()
    {
        $this->calculatorInteractiveService->run($this);
    }
}
