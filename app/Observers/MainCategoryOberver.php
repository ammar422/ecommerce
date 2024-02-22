<?php

namespace App\Observers;

use App\Models\MainCategorie;

class MainCategoryOberver
{
    /**
     * Handle the MainCategorie "created" event.
     */
    public function created(MainCategorie $mainCategorie): void
    {
        //
    }

    /**
     * Handle the MainCategorie "updated" event.
     */
    public function updated(MainCategorie $mainCategorie): void
    {
        if ($mainCategorie->active == 'active')
            $mainCategorie->vendors()
                ->update(
                    [
                        'active' => '1'
                    ]
                );
        else

            $mainCategorie->vendors()
                ->update(
                    [
                        'active' => '0'
                    ]
                );
    }

    /**
     * Handle the MainCategorie "deleted" event.
     */
    public function deleted(MainCategorie $mainCategorie): void
    {
        //
    }

    /**
     * Handle the MainCategorie "restored" event.
     */
    public function restored(MainCategorie $mainCategorie): void
    {
        //
    }

    /**
     * Handle the MainCategorie "force deleted" event.
     */
    public function forceDeleted(MainCategorie $mainCategorie): void
    {
        //
    }
}
