<?php

use App\Models\Setting;

    if (!function_exists('getCurrency')) {
        function getCurrency() {
            $settings = Setting::query()->first();
            return match (auth()->user()['currency'] ?? $settings['base_currency']) {
                "NGN" => "₦",
                "USD" => "$",
                default => auth()->user()['currency'] ?? $settings['base_currency'],
            };
        }
    }

    if (!function_exists('getAmountEquivalent')) {
        function getAmountEquivalent($amount) {
            $settings = Setting::query()->first();
            $currency = auth()->user()['currency'] ?? $settings['base_currency'];
            if ($currency == $settings['base_currency'])
                return $amount;
            elseif ($currency == 'USD')
                return $amount / ($settings['usd_to_ngn'] + $settings['rate_plus']);
            else
                return $amount * ($settings['usd_to_ngn'] + $settings['rate_plus']);
        }
    }
?>
