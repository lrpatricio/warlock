<?php
/**
 * Created by PhpStorm.
 * User: leona
 * Date: 09/04/2017
 * Time: 08:44
 */

namespace Warlock\Utils;

use DateTime;

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

    public static function encode($obj, $toJson = false)
    {
        if (!$toJson && self::is($obj))
        {
            $class = get_class($obj);
            $retorno = new $class();
        }
        else
        {
            $retorno = new \stdClass();
        }

        if ($obj)
        {
            foreach ($obj as $index => $item)
            {
                if (!Arrays::is($item) && !self::is($item))
                {
                    $retorno->$index = utf8_encode($item);
                }
                else
                {
                    if (self::is($item) && !($item instanceof DateTime))
                    {
                        $retorno->$index = self::encode($item, $toJson);
                    }
                    else
                    {
                        $retorno->$index = $item;
                    }
                }
            }
        }
        return $retorno;
    }

    public static function to_array($obj)
    {
        $retorno = array();
        if ($obj)
        {
            foreach ($obj as $index => $item)
            {
                $retorno[$index] = $item;
            }
        }
        return $retorno;
    }


    /**
     * @param array $array
     * @return string
     */
    public static function show($array)
    {
        return "<pre>".var_export($array, true)."</pre>";
    }
}