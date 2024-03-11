<?php

namespace App\Observers;

use App\Models\Vendor;
use Illuminate\Support\Str;
use App\Notifications\VendorCreated;
use Illuminate\Support\Facades\Notification;

class VendorObserver
{
    /**
     * Handle the Vendor "created" event.
     */
    public function created(Vendor $vendor): void
    {
        Notification::send($vendor, new VendorCreated($vendor));
    }

    /**
     * Handle the Vendor "updated" event.
     */
    public function updated(Vendor $vendor): void
    {
        //
    }

    /**
     * Handle the Vendor "deleted" event.
     */
    public function deleted(Vendor $vendor): void
    {
        $logo = Str::after($vendor->logo, 'ecommerce');
        unlink(base_path() . $logo);
    }

    /**
     * Handle the Vendor "restored" event.
     */
    public function restored(Vendor $vendor): void
    {
        // 
    }

    /**
     * Handle the Vendor "force deleted" event.
     */
    public function forceDeleted(Vendor $vendor): void
    {
        //
    }
}
