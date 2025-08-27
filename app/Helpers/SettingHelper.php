<?php

use Illuminate\Support\Facades\Cache;
use App\Models\Setting;

if (!function_exists('settings')) {
    function settings()
    {
        return Cache::rememberForever('settings', function () {
            return Setting::pluck('value', 'key')->toArray();
        });
    }
}

if (!function_exists('save_setting')) {
    function save_setting($key, $value)
    {
        Setting::updateOrCreate(['key' => $key], ['value' => $value]);

        Cache::forget('settings');
    }
}
