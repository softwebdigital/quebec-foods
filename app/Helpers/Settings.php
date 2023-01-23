<?php

use App\Models\Setting;

if (!function_exists('investment_enabled')) {
    function investment_enabled(): bool
    {
        return Setting::query()->first()['invest'] == 1;
    }
}
