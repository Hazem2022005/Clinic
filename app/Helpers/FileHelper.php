<?php

namespace App\Helpers;

class FileHelper
{
    public static function image(string $path = null)
    {
        return isset($path) ? asset('storage/' . $path) : asset('site/images/major.jpg');
    }

    public static function userimage(string $path = null)
    {
        return isset($path) ? asset('storage/' . $path) : asset('site/images/user.png');
    }
}
