<?php
/**
 * Created by PhpStorm.
 * User: leona
 * Date: 09/04/2017
 * Time: 08:44
 */

namespace Warlock\Utils;


class Object
{
    /**
     * @param $var
     * @return bool
     */
    public static function is($var)
    {
        return is_object($var);
    }

    /**
     * @param $object
     * @return array
     */
    public static function get_vars($object)
    {
        return get_object_vars($object);
    }
}