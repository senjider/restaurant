<?php

use App\Utility\AppSettingUtility;

if (!function_exists('settingHelper')) {

    function settingHelper($key)
    {
        try {
            $settings = AppSettingUtility::settings();
            if (!blank($key)) {
                $data = $settings->where('key', $key)->first();
                return $data->value;
            }
            return '';
        } catch (\Exception $e){
            return '';
        }
    }
}
