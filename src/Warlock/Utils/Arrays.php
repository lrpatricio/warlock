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
    /**
     * @param $var
     * @return bool
     */
    public static function is($var)
    {
        return is_array($var);
    }

    /**
     * @param $needle
     * @param array $haystack
     * @param bool $strict
     * @return bool
     */
    public static function in($needle, $haystack, $strict = false)
    {
        return in_array($needle, $haystack, $strict);
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

    /**
     * @param $needle
     * @param array $haystack
     * @param null $strict
     * @return mixed
     */
    public static function search($needle, $haystack, $strict = null)
    {
        return array_search($needle, $haystack, $strict);
    }

    /**
     * Retorna um item aleatório de um array
     * @param array $array
     * @return mixed
     */
    public static function random($array)
    {
        srand((double)microtime() * 1000000);
        $select = rand(0, count($array) - 1);

        return $array[$select];
    }
}