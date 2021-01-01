<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UserMailerJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $configuration;
    public $to;
    public $mailable;
    public $subject;

    /**
    * Create a new job instance.
    *
    * @param array $configuration
    * @param string $to
    * @param Mailable $mailable
    */
    public function __construct(array $configuration, string $to, Mailable $mailable, string $subject = null)
    {
        $this->configuration = $configuration;
        $this->to = $to;
        $this->mailable = $mailable;
        $this->subject = $subject ? $subject : 'Default';
    }

    /**
    * Execute the job.
    *
    * @return void
    */
    public function handle()
    {
        $mailer = app()->makeWith('user.mailer', $this->configuration);
        $mailer->to($this->to)->send($this->mailable);
    }
}
