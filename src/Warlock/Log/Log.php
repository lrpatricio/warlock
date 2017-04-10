<?php
/**
 * Created by PhpStorm.
 * User: leona
 * Date: 10/04/2017
 * Time: 16:53
 */

namespace Warlock\Log;

/**
 * Classe utilizada para gerar log quando o error log está desativado
 * e não possui acesso a configutação do PHP
 * Class Log
 * @package Warlock\Log
 */
class Log
{
    const DIR = __DIR__."files/";
    private static $file_name;

    /**
     * Obter nome do arquivo de log, por default é error_log_{DATAATUAL}.txt
     * @return mixed
     */
    public static function getFileName()
    {
        if (!static::$file_name)
        {
            static::$file_name = "error_log_".date('Ymd').".txt";
        }

        return static::$file_name;
    }

    /**
     * Alterar nome do aquivo de log
     * @param $file_name
     */
    public static function setFileName($file_name)
    {
        static::$file_name = $file_name;
    }

    /**
     * Gerar Log
     * @param $str
     * @param bool $file_name
     */
    public static function gerar($str, $file_name = false)
    {
        $file_name = $file_name ? $file_name : static::getFileName();
        $file = self::DIR.$file_name;

        $fh = fopen($file, 'a');
        fwrite($fh, date("d-m-Y H:i:s")." - ".$str.PHP_EOL.PHP_EOL);
        fclose($fh);
    }
}