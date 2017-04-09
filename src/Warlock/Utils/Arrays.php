<?php
/**
 * Created by PhpStorm.
 * User: leona
 * Date: 09/04/2017
 * Time: 08:44
 */

namespace Warlock\Utils;


class Arrays
{
    public static function is($var)
    {
        return is_array($var);
    }

    /**
     * @param $input
     * @param null $search_value
     * @param null $strict
     * @return array
     */
    public static function get_keys($input, $search_value = null, $strict = null)
    {
        return array_keys($input, $search_value, $strict);
    }
}