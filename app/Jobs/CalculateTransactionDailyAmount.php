<?php

namespace App\Jobs;

use App\Services\CalculateTransactionsDailyAmount;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;


class CalculateTransactionDailyAmount implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected CalculateTransactionsDailyAmount $calculateService;

    /**
     * Create a new job instance.
     *
     * @param CalculateTransactionsDailyAmount $calculateService
     */
    public function __construct(CalculateTransactionsDailyAmount $calculateService)
    {
        $this->calculateService = $calculateService;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $result = $this->calculateService->calculate(Carbon::now());

        echo "Calculation result: $result";
    }
}
