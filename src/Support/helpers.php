<?php

/*
 * Hashids Helper
 */
if (! function_exists('hashids')) {
    function hashids(?string $salt = null, ?int $length = null, ?string $alphabet = null): \CleaniqueCoders\LaravelObservers\Services\Hashids
    {
        return \CleaniqueCoders\LaravelObservers\Services\Hashids::make($salt, $length, $alphabet);
    }
}