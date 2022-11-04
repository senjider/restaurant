<?php

namespace App\Utility;

use App\Models\General\Setting;
use Illuminate\Support\Facades\Cache;

class AppSettingUtility
{

    public static function settings()
    {
        return Cache::rememberForever('settings', function (){
            return Setting::all();
        });
    }
}
