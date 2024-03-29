<?php

namespace App\Providers;

use App\Models\MainCategorie;
use App\Models\Vendor;
use App\Observers\MainCategoryOberver;
use App\Observers\VendorObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];
    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        MainCategorie::observe(MainCategoryOberver::class);
        Vendor::observe(VendorObserver::class);
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
