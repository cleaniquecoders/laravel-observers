<?php

use Carbon\Carbon;
use CleaniqueCoders\LaravelObservers\Services\Hashids;
use Illuminate\Support\Str;

/*
 * Get Reference
 *
 * @todo Use Cache to Speed up the Query
 */
if (! function_exists('generate_reference')) {
    function generate_reference($prefix = 'DOCUMENT REFERENCE', $count = false)
    {
        $explode = explode(' ', $prefix);
        foreach ($explode as $word) {
            $reference_number[] = abbrv($word);
        }

        $reference_number[] = Carbon::now()->format('Y/m/d');

        if ($count != false) {
            $reference_number[] = generate_sequence($count);
        } else {
            $reference_number[] = strtoupper(Str::random(config('document.sequence_length')));
        }

        return implode('/', $reference_number);
    }
}

/*
 * Hashids Helper
 */
if (! function_exists('hashids')) {
    function hashids(?string $salt = null, ?int $length = null, ?string $alphabet = null): Hashids
    {
        return Hashids::make($salt, $length, $alphabet);
    }
}
