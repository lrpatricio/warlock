<?php
/**
 * Created by PhpStorm.
 * User: leona
 * Date: 07/04/2017
 * Time: 18:16
 */

namespace Warlock\Utils;


use Warlock\Exception\MathException;
use Warlock\Exception\MessageErrors;

class Math
{
    /**
     * @param float $base
     * @param float $exp
     * @return float
     */
    public static function pow($base, $exp)
    {
        return pow($base, $exp);
    }

    /**
     * @param number $number
     * @param int $precision
     * @param int $mode
     * @return float
     */
    public static function round($number, $precision = 0, $mode = PHP_ROUND_HALF_UP)
    {
        return round($number, $precision, $mode);
    }

    /**
     * @param float $number
     * @param int $precision
     * @return float
     */
    public static function ceil($number, $precision = 0)
    {
        if($precision > 0)
        {
            $pow = self::pow(10, $precision);
            $result = ceil($number * $pow) / $pow;

            return $result;
        }
        else
        {
            return ceil($number);
        }
    }

    /**
     * @param float $number
     * @param int $precision
     * @return float
     */
    public static function floor($number, $precision = 0)
    {
        if($precision > 0)
        {
            $pow = self::pow(10, $precision);
            $result = floor($number * $pow) / $pow;

            return $result;
        }
        else
        {
            return floor($number);
        }
    }

    /**
     * Soma os valores dos itens do array
     * @param array $values
     * @return float
     * @throws MathException
     */
    public static function sum($values)
    {
        if(!is_array($values))
        {
            throw MessageErrors::get_exception_by_code(5001);
        }

        $response = 0;
        foreach ($values as $item)
        {
            if (!is_numeric($item))
            {
                throw MessageErrors::get_exception_by_code(5002);
            }
            $response += $item;
        }

        return $response;
    }
}