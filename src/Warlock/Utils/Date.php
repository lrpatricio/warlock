<?php
/**
 * Created by PhpStorm.
 * User: leona
 * Date: 10/04/2017
 * Time: 17:26
 */

namespace Warlock\Utils;

use DateTime;

class Date
{
    public static function get_hoje()
    {
        return self::get_formatted("Y-m-d");
    }

    public static function get_hora()
    {
        return self::get_formatted("H:i:s");
    }

    public static function get_hoje_br()
    {
        return self::get_formatted("d/m/Y");
    }

    public static function get_dt()
    {
        return self::get_formatted("Ymd");
    }

    public static function get($timestamp = null)
    {
        $dt = new DateTime();
        if ($timestamp)
        {
            $dt->setTimestamp($timestamp);
        }
        return $dt;
    }

    public static function get_formatted($format, $timestamp = null)
    {
        $dt = self::get($timestamp);
        return $dt->format($format);
    }
}