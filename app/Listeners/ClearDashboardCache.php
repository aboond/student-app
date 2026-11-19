<?php

namespace App\Listeners;

use App\Events\StudentCreated;
use Illuminate\Support\Facades\Cache;

class ClearDashboardCache
{
    public function handle(StudentCreated $event): void
    {
        Cache::forget('dashboard.stats');
    }
}
