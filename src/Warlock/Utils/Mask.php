<?php
/**
 * Created by PhpStorm.
 * User: Android
 * Date: 18/03/15
 * Time: 14:00
 */

namespace Warlock\Utils;

class Mask
{
    public static function cpf($val)
    {
        return static::custom($val, "###.###.###-##");
    }

    public static function cnpj($val)
    {
        return static::custom($val, "##.###.###/####-##");
    }

    public static function cep($val)
    {
        return static::custom($val, "##.###-###");
    }

    public static function custom($val, $mask)
    {
        $maskared = '';
        $k = 0;
        $len_mask = strlen($mask) - 1;
        for($i = 0; $i <= $len_mask; $i++)
        {
            $char_mask = substr($mask, $i, 1);
            if($char_mask == '#')
            {
                $char_val = substr($val, $k, 1);
                $maskared .= $char_val;
                $k++;
            }
            else
            {
                if($char_mask)
                {
                    $maskared .= $char_mask;
                }
            }
        }
        return $maskared;
    }
}