<?php
/**
 * Created by PhpStorm.
 * User: leona
 * Date: 09/04/2017
 * Time: 07:54
 */

namespace Warlock\Http;


class URL
{
    const REG_EXPR = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";

    /**
     * @param $string
     * @param bool $slug
     * @return string
     */
    public static function dinamica($string, $slug = false)
    {
        //$string = strtolower(strip_tags($string));
        // Código ASCII das vogais
        $ascii['a'] = range(224, 230);
        $ascii['e'] = range(232, 235);
        $ascii['i'] = range(236, 239);
        $ascii['o'] = array_merge(range(242, 246), array(240, 248));
        $ascii['u'] = range(249, 252);

        $ascii['A'] = range(192, 197);
        $ascii['E'] = range(200, 203);
        $ascii['I'] = range(204, 207);
        $ascii['O'] = range(210, 214);
        $ascii['U'] = range(217, 220);

        // Código ASCII dos outros caracteres
        $ascii['b'] = array(223);
        $ascii['c'] = array(231);
        $ascii['d'] = array(208);
        $ascii['n'] = array(241);
        $ascii['y'] = array(253, 255);

        $ascii['B'] = array(191);
        $ascii['C'] = array(199);
        $ascii['D'] = array(176);
        $ascii['N'] = array(209);
        $ascii['Y'] = array(221, 223);

        foreach ($ascii as $key => $item)
        {
            $acentos = '';
            foreach ($item AS $codigo)
            {
                $acentos .= chr($codigo);
            }
            $troca[$key] = '/['.$acentos.']/i';
        }

        $string = preg_replace(array_values($troca), array_keys($troca), $string);

        // Slug?
        if ($slug)
        {
            // Troca tudo que não for letra ou número por um caractere ($slug)
            $string = preg_replace('/[^a-z0-9]/i', $slug, $string);
            // Tira os caracteres ($slug) repetidos
            $string = preg_replace('/'.$slug.'{2,}/i', $slug, $string);
            $string = trim($string, $slug);
        }

        return strtolower($string);
    }
}