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
    public static function htmlspecialchars($string, $flags = ENT_COMPAT, $encoding = 'UTF-8', $double_encode = true)
    {
        return htmlspecialchars($string, $flags, $encoding, $double_encode);
    }
}