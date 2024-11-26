<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class HlpCkeditor extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'ckeditorhelper';
    }

}
