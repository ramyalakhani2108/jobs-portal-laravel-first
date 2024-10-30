<?php

namespace App\Jobs;

use App\Models\Job;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class TranslateJob implements ShouldQueue
{
    use Queueable,Dispatchable, InteractsWithQueue,SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(public Job $jobListings) //this is not the job we created for job_listing but it is the queued job
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        logger('Translating '. $this->jobListings->title. ' to Spanish');
    }
}
