<?php

namespace App\Listeners;

use App\Events\TeacherCreated;
use App\Models\ActivityLog;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreatedTeacherLog
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
        ActivityLog::create([
            'description' => 'create teacher ' . $event->teacher->name
        ]);
    }
}
