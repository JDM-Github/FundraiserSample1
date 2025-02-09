<?php

namespace App\Traits;

trait NewsScopes
{
    public function scopeActive($query)
    {
        return $query->whereDate('publish_date', '<=', now())
            ->whereDate('expiration_date', '>=', now());
    }
}

