<?php
/**
 * Created by PhpStorm.
 * User: leona
 * Date: 07/04/2017
 * Time: 18:48
 */

namespace Warlock\Exception;


class MessageErrors
{
    private static $errors = array(
        5001 => array(
            "class" => "\\Warlock\\Exception\\MathException",
            "message" => "O parâmetro values do método sum de Math deve ser um array."
        ),
        5002 => array(
            "class" => "\\Warlock\\Exception\\MathException",
            "message" => "Os itens do array values deve conter um valor numérico."
        ),
    );

    /**
     * @param int $code
     * @return \Exception
     */
    public static function get_exception_by_code($code)
    {
        $error = self::$errors[$code];
        if($error)
        {
            $class = $error["class"];
            return new $class($error["message"], $code);
        }
        else
        {
            return new \Exception();
        }
    }
}