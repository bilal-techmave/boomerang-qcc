<?php

namespace App\Jobs;

use App\Models\MissedClean;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class MissedClen implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $missedClean;
    /**
     * Create a new job instance.
     */
    public function __construct(MissedClean $missedClean)
    {
        $this->missedClean = $missedClean;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        try {
            // Attempt job logic
            // ...
        } catch (\Exception $e) {
            // Handle the exception
            // ...

            // Optionally, manually fail the job
            $this->fail($e); // or rethrow the exception
        }
    }
}
