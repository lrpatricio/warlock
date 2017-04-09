<?php

namespace Warlock\Security;

use Warlock\Utils\Arrays;
use Warlock\Utils\Html;
use Warlock\Utils\Object;
use Warlock\Utils\Strings;

class Sanitizer
{

    /**
     * Limpa os valores do tipo string de possíveis ataques
     */
    public static function sanitize(&$input)
    {
        if (Strings::is($input))
        {
            //Do proccess
            self::proccess($input);
        }
        else if (Arrays::is($input))
        {
            foreach ($input as &$value)
            {
                self::sanitize($value);
            }

            unset($value);
        }
        else if (Object::is($input))
        {
            $vars = Arrays::get_keys(Object::get_vars($input));

            foreach ($vars as $var)
            {
                self::sanitize($input->$var);
            }
        }
        return $input;
    }

    public static function injection(&$input)
    {
        $input = preg_replace(sql_regcase("/(from|select|insert|delete|where|drop table|show tables)/"), "", $input);
        $input = Strings::trim($input);
        $input = Strings::strip_tags($input);
        $input = (get_magic_quotes_gpc()) ? $input : Strings::addslashes($input);
    }

    public static function xss(&$input)
    {
        $input = Html::htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
    }

    private static function proccess(&$input)
    {
        self::xss($input);
        self::injection($input);
    }
}