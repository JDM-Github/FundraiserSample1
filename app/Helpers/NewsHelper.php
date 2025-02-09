<?php

namespace App\Helpers;

use App\Models\News;
use Illuminate\Support\Str;

class NewsHelper
{
    // Can't think of anything, so maybe this?
    // Add nalang ng iba pa if ever
    public static function formatDate($date)
    {
        return date('F d, Y', strtotime($date));
    }

    // Eto dagdag
    // Para ket ung slug is same, di nag eerror
    public static function generateUniqueSlug($headline, $counter = 0)
    {
        $slug = Str::slug($headline);
        if ($counter > 0) {
            $slug .= '-' . $counter;
        }

        if (News::where('slug', $slug)->exists()) {
            return NewsHelper::generateUniqueSlug($headline, $counter + 1);
        }
        return $slug;
    }
}
