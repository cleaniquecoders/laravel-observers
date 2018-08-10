<?php

/*
 * generate sequence
 * @return sequence based on length supplied
 */
if (! function_exists('generate_sequence')) {
    function generate_sequence($input = 1)
    {
        return str_pad($input, config('document.sequence_length'), '0', STR_PAD_LEFT);
    }
}

/*
 * Get Abbreviation fo the given text
 */
if (! function_exists('abbrv')) {
    function abbrv($value, $unique_characters = true)
    {
        $removeNonAlphanumeric = preg_replace('/[^A-Za-z0-9 ]/', '', $value);
        $removeVowels          = str_replace(
            ['a', 'e', 'i', 'o', 'u', 'A', 'E', 'I', 'O', 'U', ' '],
            '',
            $removeNonAlphanumeric);

        $uppercase = strtoupper($removeVowels);

        if ($unique_characters) {
            $split             = str_split($uppercase);
            $unique_characters = [];
            foreach ($split as $character) {
                if (! in_array($character, $unique_characters)) {
                    $unique_characters[] = $character;
                }
            }

            return implode('', $unique_characters);
        }

        return $uppercase;
    }
}

/*
 * Get Reference
 *
 */
if (! function_exists('generate_reference')) {
    function generate_reference($prefix = 'DOCUMENT REFERENCE', $count = false)
    {
        $explode = explode(' ', $prefix);
        foreach ($explode as $word) {
            $reference_number[] = abbrv($word);
        }

        $reference_number[] = now()->format('Y/m/d');

        if (false != $count) {
            $reference_number[] = generate_sequence($count);
        } else {
            $reference_number[] = strtoupper(\Illuminate\Support\Str::random(config('document.sequence_length')));
        }

        return implode('/', $reference_number);
    }
}

/*
 * Get Slug Name for Fully Qualified Class Name (FQCN)
 */
if (! function_exists('str_slug_fqcn')) {
    function str_slug_fqcn($object)
    {
        return strtolower(str_replace('\\', '-', get_class($object)));
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