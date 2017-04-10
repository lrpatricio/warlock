<?php
/**
 * Created by PhpStorm.
 * User: leona
 * Date: 10/04/2017
 * Time: 17:56
 */

namespace Warlock\Utils;


use Warlock\Enum\Validate;

class Password
{
    /**
     * Gerar randomicamente
     * @param $numCaracteres
     * @return string
     */
    public static function random($numCaracteres)
    {
        $senha = "";
        for ($i = 0; $i < $numCaracteres; $i++)
        {
            $id = Arrays::random(Validate::ALPHA_NUM);
            $idArray = Arrays::search($id, Validate::ALPHA_NUM);

            $senha .= Validate::ALPHA_NUM[$idArray];
        }
        return $senha;
    }

    public static function resenha($nMaxChar, $file, $qtdeChar = 0, $complemento = " [...]")
    {
        $nCaracter = (($qtdeChar) ? $qtdeChar : $nMaxChar);
        $qteCaracter = Strings::length(Html::strip_tags($file));
        $arrayTexto = Strings::explode("<br />", Strings::nl2br(Html::strip_tags($file)));

        if($qteCaracter > $nCaracter)
        {
            $foundSpace = false;
            do
            {
                $lastCaracter = Strings::substring($arrayTexto[0], $nCaracter - 1, 1);

                if($lastCaracter == " ")
                {
                    $foundSpace = true;
                }
                else
                {
                    $nCaracter--;
                }

                if($nCaracter == 0)
                {
                    $foundSpace = true;
                    $nCaracter = (($qtdeChar) ? $qtdeChar : $nMaxChar);
                }
            } while($foundSpace != true);
        }

        return $texto = Strings::substring($arrayTexto[0], 0, $nCaracter).(($qteCaracter > $nCaracter) ? $complemento : "");
    }
}