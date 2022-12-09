<?php

if (!function_exists('get_page')) {
    function get_page(): int
    {
        return (int) (request()->input('page') ?? 1);
    }
}

if (!function_exists('get_per_page')) {
    function get_per_page(): int
    {
        return (int) (request()->input('per_page') ?? 50);
    }
}
