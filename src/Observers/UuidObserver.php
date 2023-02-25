<?php

namespace CleaniqueCoders\LaravelObservers\Observers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

/**
 * See events.
 *
 * @href https://laravel.com/docs/5.5/eloquent#events
 * Available metthods: retrieved, creating, created, updating, updated,
 * saving, saved, deleting, deleted, restoring, restored
 */
class UuidObserver
{
    /**
     * Listen to the creating event.
     */
    public function creating(Model $model)
    {
        // we only create this once
        if (Schema::hasColumn($model->getTable(), 'uuid') && is_null($model->uuid)) {
            $model->uuid = Str::uuid();
        }
    }
}
