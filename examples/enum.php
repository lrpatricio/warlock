<?php
/**
 * Created by PhpStorm.
 * User: leona
 * Date: 07/04/2017
 * Time: 17:49
 */

require_once __DIR__.'/../vendor/autoload.php';


try
{
    echo \Warlock\Utils\Math::sum("leo");
}
catch (Exception $e)
{
    echo $e->getMessage();
}