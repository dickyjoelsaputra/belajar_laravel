<?php

namespace App\Listeners;

use App\Mail\TestSendEmail;
use App\Events\TeacherCreated;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmailToUser
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\TeacherCreated  $event
     * @return void
     */
    public function handle(TeacherCreated $event)
    {
        Mail::to('dikjulpler@gmail.com')->send(new TestSendEmail());
    }
}
