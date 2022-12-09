<?php

use App\Models\Setting;

    if (!function_exists('getCurrency')) {
        function getCurrency() {
            $settings = Setting::query()->first();
            return match ($settings['base_currency']) {
                "NGN" => "₦",
                "USD" => "$",
                default => $settings['base_currency'],
            };
        }
    }
?>
