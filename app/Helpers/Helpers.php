<?php
namespace App\Helpers;

class Helpers
{
    public static function shortText($kelime, $str = 10)
    {
        if (strlen($kelime) > $str)
        {
            if (function_exists("mb_substr")) $kelime = mb_substr($kelime, 0, $str, "UTF-8").'..';
            else $kelime = substr($kelime, 0, $str).'..';
        }
        return strip_tags($kelime);
    }
}
