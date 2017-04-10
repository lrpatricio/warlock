<?php
/**
 * Created by PhpStorm.
 * User: leona
 * Date: 09/04/2017
 * Time: 08:09
 */

namespace Warlock\Utils;


class Strings
{
    public static $rmName = array("#", " ", "?", "-", "à", "á", "â", "ã", "ä", "å", "ç", "è", "é", "ê", "ë", "ì", "í", "î", "ï", "ñ", "ò", "ó", "ô", "õ", "ö", "ù", "ü", "ú", "ÿ", "À", "Á", "Â", "Ã", "Ä", "Å", "Ç", "È", "É", "Ê", "Ë", "Ì", "Í", "Î", "Ï", "Ñ", "Ò", "Ó", "Ô", "Õ", "Ö", "O", "Ù", "Ü", "Ú", "Ÿ", "-", "(", ")", "+");
    public static $rmNameNew = array("", "_", "", "", "a", "a", "a", "a", "a", "a", "c", "e", "e", "e", "e", "i", "i", "i", "i", "n", "o", "o", "o", "o", "o", "u", "u", "u", "y", "A", "A", "A", "A", "A", "A", "C", "E", "E", "E", "E", "I", "I", "I", "I", "N", "O", "O", "O", "O", "O", "O", "U", "U", "U", "Y", "Y", "_", "", "", "_");

    /**
     * @param $var
     * @return bool
     */
    public static function is($var)
    {
        return is_string($var);
    }

    /**
     * @param string $string
     * @return string
     */
    public static function replace_special_chars($string)
    {
        return str_replace(self::$rmName, self::$rmNameNew, $string);
    }

    /**
     * @param string $data
     * @return string
     */
    public static function utf8_encode($data)
    {
        return utf8_encode($data);
    }

    /**
     * @param string $data
     * @return string
     */
    public static function utf8_decode($data)
    {
        return utf8_decode($data);
    }

    /**
     * @param string $delimiter
     * @param string $string
     * @param int|null $limit
     * @return array
     */
    public static function explode($delimiter, $string, $limit = null)
    {
        return explode($delimiter, $string, $limit);
    }

    /**
     * @param string $glue
     * @param array $pieces
     * @return string
     */
    public static function implode($glue, $pieces)
    {
        return implode($glue, $pieces);
    }

    /**
     * @param string $glue
     * @param array $pieces
     * @return string
     */
    public static function join($glue, $pieces)
    {
        return join($glue, $pieces);
    }

    /**
     * @param string $string
     * @param null|bool $is_xhtml
     * @return string
     */
    public static function nl2br($string, $is_xhtml = null)
    {
        return nl2br($string, $is_xhtml);
    }

    /**
     * @param string|array $search
     * @param string|array $replace
     * @param string $subject
     * @param int|null $count
     * @return mixed
     */
    public static function replace($search, $replace, $subject, &$count = null)
    {
        return str_replace($search, $replace, $subject, $count);
    }

    /**
     * @param string|array $search
     * @param string|array $replace
     * @param string $subject
     * @param int|null $count
     * @return mixed
     */
    public static function ireplace($search, $replace, $subject, &$count = null)
    {
        return str_ireplace($search, $replace, $subject, $count);
    }

    /**
     * @param string $string
     * @return int
     */
    public static function length($string)
    {
        return strlen($string);
    }

    /**
     * @param string $string
     * @return int
     */
    public static function first_pos($haystack, $needle, $offset = 0)
    {
        return strpos($haystack, $needle, $offset);
    }

    /**
     * @param string $string
     * @return int
     */
    public static function last_pos($haystack, $needle)
    {
        return strrchr($haystack, $needle);
    }

    /**
     * @param string $string
     * @return string
     */
    public static function lowercase($string)
    {
        return strtolower($string);
    }

    /**
     * @param string $string
     * @return string
     */
    public static function uppercase($string)
    {
        return strtoupper($string);
    }

    /**
     * @param string $string
     * @return string
     */
    public static function ucfirst($string)
    {
        return ucfirst($string);
    }

    /**
     * @param string $string
     * @param string $delimiters
     * @return string
     */
    public static function ucwords($string, $delimiters = " \t\r\n\f\v")
    {
        return ucwords($string, $delimiters);
    }

    /**
     * @param string $string
     * @param int $start
     * @param int|null $length
     * @return string
     */
    public static function substring($string, $start, $length = null)
    {
        return substr($string, $start, $length);
    }

    /**
     * @param string $string
     * @return string
     */
    public static function shuffle($string)
    {
        return str_shuffle($string);
    }

    /**
     * @param string $string1
     * @param string $string2
     * @return int
     */
    public static function compare($string1, $string2)
    {
        return strcmp($string1, $string2);
    }

    /**
     * @param string $string
     * @param string $charlist
     * @return string
     */
    public static function trim($string, $charlist = " \t\n\r\0\x0B")
    {
        return trim($string, $charlist);
    }

    /**
     * @param string $str
     * @param bool|null $allowable_tags
     * @return string
     */
    public static function strip_tags($string, $allowable_tags = null)
    {
        return strip_tags($string, $allowable_tags);
    }

    /**
     * @param string $string
     * @return string
     */
    public static function addslashes($string)
    {
        return addslashes($string);
    }

    public static function repeat($input, $multiplier)
    {
        return str_repeat($input, $multiplier);
    }


    /**
     * @param string $string
     */
    public static function show($string)
    {
        echo $string;
    }
}