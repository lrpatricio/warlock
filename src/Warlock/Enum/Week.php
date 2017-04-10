<?php
/**
 * Created by PhpStorm.
 * User: leona
 * Date: 10/04/2017
 * Time: 17:13
 */

namespace Warlock\Enum;


abstract class Week
{
    const DOMINGO = 1;
    const SEGUNDA = 2;
    const TERCA = 3;
    const QUARTA = 4;
    const QUINTA = 5;
    const SEXTA = 6;
    const SABADO = 7;

    public static $names = array(
        self::DOMINGO => "Domingo",
        self::SEGUNDA => "Segunda-feira",
        self::TERCA => "Terça-feira",
        self::QUARTA => "Quarta-feira",
        self::QUINTA => "Quinta-feira",
        self::SEXTA => "Sexta-feira",
        self::SABADO => "Sábado"
    );

    public static $abreviacoes = array(
        self::DOMINGO => "Dom",
        self::SEGUNDA => "Seg",
        self::TERCA => "Ter",
        self::QUARTA => "Qua",
        self::QUINTA => "Qui",
        self::SEXTA => "Sex",
        self::SABADO => "Sáb"
    );
}