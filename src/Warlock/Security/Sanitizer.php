<?php

namespace Warlock\Security;

class Sanitizer {

	/**
	 * Limpa os valores do tipo string de possíveis ataques
	 */
	public static function sanitize(&$input) {
		if (is_string($input)) {
            //Do proccess
			self::proccess($input);
        } else if (is_array($input)) {
            foreach ($input as &$value) {
                self::sanitize($value);
            }
            
            unset($value);
        } else if (is_object($input)) {
            $vars = array_keys(get_object_vars($input));
            
            foreach ($vars as $var) {
                self::sanitize($input->$var);
            }
        }
        return $input;
	}

	public static function injection(&$input) {
		$input = preg_replace(sql_regcase("/(from|select|insert|delete|where|drop table|show tables)/"), "" ,$input);
	   	$input = trim($input);
	   	$input = strip_tags($input);
	   	$input = (get_magic_quotes_gpc()) ? $input : addslashes($input);
	}

	public static function xss(&$input) {
		$input = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
	}

	private static function proccess(&$input) {
		self::xss($input);
		self::injection($input);
	}
}