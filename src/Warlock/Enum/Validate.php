<?php
/**
 * Created by PhpStorm.
 * User: leona
 * Date: 10/04/2017
 * Time: 18:12
 */

namespace Warlock\Enum;


class Validate
{
    const NUM = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9");
    const ALPHA = array(
        "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m",
        "n", "o", "p", "q", "r", "s", "t",  "u", "v", "x", "z", "y", "w"
    );
    const ALPHA_NUM = array(
        "0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "a", "b",
        "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n",
        "o", "p", "q", "r", "s", "t", "u", "v", "x", "z", "y", "w"
    );
}