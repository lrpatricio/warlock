<?php
/**
 * Created by PhpStorm.
 * User: leona
 * Date: 10/04/2017
 * Time: 18:31
 */

namespace Warlock\Utils;


class Directory
{
    /**
     * @param $directory
     * @return string
     */
    public static function get_name($directory)
    {
        return dirname($directory);
    }
}