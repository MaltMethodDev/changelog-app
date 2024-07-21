<?php

namespace App\Observers;

use App\Models\Change;

class ChangeObserver
{
    /**
     * Handle the Change "created" event.
     */
    public function created(Change $change): void
    {
        //
    }

    /**
     * Handle the Change "updated" event.
     */
    public function updated(Change $change): void
    {
        //
    }

    /**
     * Handle the Change "deleted" event.
     */
    public function deleted(Change $change): void
    {
        //
    }

    /**
     * Handle the Change "restored" event.
     */
    public function restored(Change $change): void
    {
        //
    }

    /**
     * Handle the Change "force deleted" event.
     */
    public function forceDeleted(Change $change): void
    {
        //
    }
}
