<?php

namespace App\Jobs;

use App\Mail\SendMailService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendMailServiceJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $dataInfo;
    public $dataView;
    /**
     * Create a new job instance.
     */
    public function __construct($dataInfo, $dataView)
    {
        $this->dataInfo = $dataInfo;
        $this->dataView = $dataView;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->dataInfo['to'])
            ->send(new SendMailService($this->dataInfo, $this->dataView));
    }
}
