<?php

use App\Models\Setting;

    if (!function_exists('getCurrency')) {
        function getCurrency() {
            $settings = Setting::first();
            switch ($settings['base_currency']) {
                case "NGN":
                    return "₦";
                case "USD":
                    return "$";
                default:
                    return $settings['base_currency'];
            }
        }
    }
?>