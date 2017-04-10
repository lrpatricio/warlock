<?php
/**
 * Created by PhpStorm.
 * User: android
 * Date: 09/08/16
 * Time: 08:15
 */

namespace Warlock\Utils;


class Session
{
    public static function open()
    {
        session_start();
    }

    public static function close()
    {
        session_commit();
    }

    public static function destroy()
    {
        session_destroy();
    }

    public static function print_all()
    {
        static::open();
        echo Utils::printArray($_SESSION);
        static::close();
    }

    public static function start()
    {
        if (!self::started())
        {
            session_start();
        }
    }

    public static function started()
    {
        if (function_exists(session_status()))
        {
            return session_status() !== PHP_SESSION_NONE;
        }
        else
        {
            return isset($_SESSION);
        }
    }

    public static function write($key, $value, $serialize = false)
    {
        self::start();
        if ($serialize)
        {
            $value = serialize($value);
        }
        $_SESSION[$key] = $value;
    }

    public static function read($key, $unserialize = false)
    {
        self::start();

        if (isset($_SESSION[$key]))
        {
            $value = $_SESSION[$key];
            if ($unserialize)
            {
                return unserialize($value);
            }
            return $value;
        }

        return null;
    }
}