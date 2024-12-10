<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class HlpCkeditor extends Facade
{
    // Sử dụng facades thay cho alias đã bị bỏ ở laravel 11
    protected static function getFacadeAccessor()
    {
        return 'ckeditorhelper';
    }

}
