<?php

namespace library\backstage\utils;

use Warlock\Utils\Json;

class Request
{

    const POST = 'post';
    const GET = 'get';
    const PUT = 'put';
    const PATCH = 'patch';
    const DELETE = 'delete';

    public static function is($type)
    {
        return strtolower($_SERVER['REQUEST_METHOD']) === strtolower($type);
    }

    public static function getProjectUrl($base = "")
    {
        $doc_root = $_SERVER["DOCUMENT_ROOT"];

        if (substr($doc_root, -1) == "/")
        {
            $doc_root = substr($doc_root, 0, strlen($doc_root) - 1);
        }

        $string = dirname(__DIR__);

        if (PHP_OS == "WINNT")
        {
            $string = str_replace("\\", DIRECTORY_SEPARATOR, dirname(__DIR__));
        }

        $base = str_ireplace($doc_root, "", $string);
        $base = str_ireplace('vendor/backstage', '', $base);

        if (substr($base, 0, 1) == "\\")
        {
            $base = "/".substr($base, 1);
        }

        return $base;
    }

    public static function baseUrl()
    {
        if (php_sapi_name() == 'cli')
        {
            return '';
        }

        return sprintf(
            "%s://%s%s",
            isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
            $_SERVER['SERVER_NAME'],
            self::getProjectUrl()
        );
    }

    public static function get($name = null)
    {
        return self::__global('get', $name);
    }

    public static function post($name = null)
    {
        return self::__global('post', $name);
    }

    public static function any($name = null)
    {
        return self::__global('request', $name);
    }

    public static function all()
    {
        return array_merge(self::__global('get'), self::__global('post'));
    }

    private static function __global($which, $what = null)
    {
        $which = strtoupper($which);
        $allowed = array(
            '_POST',
            '_GET',
            '_REQUEST'
        );

        if (substr($which, 0) !== '_')
        {
            $which = '_'.$which;
        }
        if (!in_array($which, $allowed))
        {
            return null;
        }

        switch ($which)
        {
            case '_POST':
                $global = $_POST;
                break;
            case '_GET':
                $global = $_GET;
                break;
            case '_REQUEST':
                $global = $_REQUEST;
                break;
            default:
                return null;
        }


        if ($what)
        {
            if (isset($global[$what]))
            {
                //return Sanitizer::sanitize($global[$what]);
                return Json::utf8_decode_deep($global[$what]);
            }

            return null;
        }

        //return Sanitizer::sanitize($global);
        return Json::utf8_decode_deep($global);
    }

    /**
     * Redireciona o cliente para a url em questão, passando os parâmetros de $with via GET
     * @param string $to
     * @param array $with
     */
    public static function redirect($to = '/', $with = array())
    {
        $redirectUrl = self::getRedirectUrl($to, $with);
        $currentUrl = self::getRequestUrl();

        if (!self::isSameUrl($currentUrl, $redirectUrl))
        {
            header('Location: '.$redirectUrl);
        }
        die();
    }

    public static function getRedirectUrl($to, $with = array())
    {
        $queryString = empty($with) ? '' : ('?'.http_build_query($with));
        $redirectUrl = self::baseUrl().$to.$queryString;
        return $redirectUrl;
    }

    public static function isSameUrl($a, $b)
    {
        return $a == $b;
    }

    /**
     * Verifica se determinadas chaves existem na requisição
     * @param array $key
     */
    public static function has($keys = array())
    {
        $avaliable = self::all();
        foreach ($keys as $k)
        {
            if (!in_array($k, $avaliable))
            {
                return false;
            }
        }
        return true;
    }

    public static function redirectBack()
    {
        header('Location: '.$_SERVER['HTTP_REFERER']);
        die();
    }

    public static function unauthorized()
    {
        header("HTTP/1.0 401 Unauthorized");
        die();
    }

    public static function paymentRequired()
    {
        header("HTTP/1.0 402 Payment Required");
        die();
    }

    public static function forbidden()
    {
        header("HTTP/1.0 403 Forbidden");
        die();
    }

    public static function notFound()
    {
        header("HTTP/1.0 404 Not Found");
        die();
    }

    public static function methodNotAllowed()
    {
        header("HTTP/1.0 405 Method Not Allowed");
        die();
    }

    public static function internalServerError()
    {
        header("HTTP/1.0 500 Internal Server Error");
        die();
    }

    public static function notImplemented()
    {
        header("HTTP/1.0 501 Not Implemented");
        die();
    }

    public static function badGateway()
    {
        header("HTTP/1.0 502 Bad Gateway");
        die();
    }
}