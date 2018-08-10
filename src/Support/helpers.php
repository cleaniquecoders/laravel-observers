<?php

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

        $reference_number[] = \Carbon\Carbon::now()->format('Y/m/d');

        if (false != $count) {
            $reference_number[] = generate_sequence($count);
        } else {
            $reference_number[] = strtoupper(\Illuminate\Support\Str::random(config('document.sequence_length')));
        }

        return implode('/', $reference_number);
    }
}

/*
 * Hashids Helper
 */
if (! function_exists('hashids')) {
    function hashids(?string $salt = null, ?int $length = null, ?string $alphabet = null): \CleaniqueCoders\LaravelObservers\Services\Hashids
    {
        return \CleaniqueCoders\LaravelObservers\Services\Hashids::make($salt, $length, $alphabet);
    }
}