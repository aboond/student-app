<?php

namespace App\Listeners;

use App\Events\StudentCreated;
use App\Mail\StudentRegistered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendWelcomeEmail implements ShouldQueue
{
    public function handle(StudentCreated $event): void
    {
        // Mail::to($event->student->email)->send(new StudentRegistered($event->student));
    }
}
