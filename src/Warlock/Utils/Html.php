<?php
/**
 * Created by PhpStorm.
 * User: leona
 * Date: 09/04/2017
 * Time: 09:32
 */

namespace Warlock\Utils;


class Html
{
    /**
     * @param $string
     * @param int $flags
     * @param string $encoding
     * @param bool $double_encode
     * @return string
     */
    public static function specialchars($string, $flags = ENT_COMPAT, $encoding = 'UTF-8', $double_encode = true)
    {
        return htmlspecialchars($string, $flags, $encoding, $double_encode);
    }

    /**
     * @param $str
     * @param null $allowable_tags
     * @return string
     */
    public static function strip_tags($str, $allowable_tags = null)
    {
        return strip_tags($str, $allowable_tags);
    }
}