<?php
/**
 * Created by PhpStorm.
 * User: leona
 * Date: 10/04/2017
 * Time: 17:42
 */

namespace Warlock\Http;


use library\backstage\utils\Request;
use Warlock\Enum\TypeReturn;

class Curl
{
    /**
     * @param string $url
     * @param array $data
     * @param string $type
     * @param int $return_type
     * @param array $addons
     * @return mixed
     */
    public static function request($url, $data = array(), $type = Request::POST, $return_type = TypeReturn::_ARRAY, $addons = array())
    {
        $addons = array_merge(array(
            "USERPWD" => false,
            "HTTPHEADER" => false,
        ), $addons);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        if ($addons["USERPWD"])
        {
            curl_setopt($ch, CURLOPT_USERPWD, $addons["user"].":".$addons["pwd"]);
        }
        if (count($data))
        {
            if ($addons["HTTPHEADER"])
            {
                curl_setopt($ch, CURLOPT_HTTPHEADER, $addons["HTTPHEADER"]);
            }
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        }

        if (self::is_post($type))
        {
            curl_setopt($ch, CURLOPT_POST, 1);
        }
        else if (self::is_custom_request($type))
        {
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, strtoupper($type));
        }

        $output = curl_exec($ch);
        curl_close($ch);

        if (self::is_return_array($return_type))
        {
            return json_decode($output, true);
        }
        else
        {
            return $output;
        }
    }

    private static function is_post($type)
    {
        return strtolower($type) == Request::POST;
    }

    private static function is_custom_request($type)
    {
        return !(strtolower($type) == Request::POST || strtolower($type) == Request::GET);
    }

    private static function is_return_array($return_type)
    {
        return $return_type == TypeReturn::_ARRAY;
    }
}