<?php

namespace App\Observers;

use App\Models\Building;
use Illuminate\Support\Facades\Storage;

class BuildingObserver
{
    /**
     * Handle the Building "created" event.
     */
    public function created(Building $building): void
    {
        //
    }

    /**
     * Handle the Building "updated" event.
     */
    public function updated(Building $building): void
    {
        if ($building->isDirty('image')) {
            $original = $building->getOriginal('image');
            if ($original && Storage::disk('public')->exists($original)) {
                Storage::disk('public')->delete($original);
            }
        }
    }

    /**
     * Handle the Building "deleted" event.
     */
    public function deleted(Building $building): void
    {
        // Kalau pakai SoftDeletes, jangan hapus file dulu
        if (method_exists($building, 'isForceDeleting') && ! $building->isForceDeleting()) {
            return;
        }

        // Hapus file saat benar-benar dihapus
        if ($building->image && Storage::disk('public')->exists($building->image)) {
            Storage::disk('public')->delete($building->image);
        }
    }

    /**
     * Handle the Building "restored" event.
     */
    public function restored(Building $building): void
    {
        //
    }

    /**
     * Handle the Building "force deleted" event.
     */
    public function forceDeleted(Building $building): void
    {
        if ($building->image && Storage::disk('public')->exists($building->image)) {
            Storage::disk('public')->delete($building->image);
        }
    }
}
