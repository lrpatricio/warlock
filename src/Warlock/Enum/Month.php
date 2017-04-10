<?php
/**
 * Created by PhpStorm.
 * User: leona
 * Date: 10/04/2017
 * Time: 17:12
 */

namespace Warlock\Enum;


abstract class Month
{
    const JANEIRO = 1;
    const FEVEREIRO = 2;
    const MARCO = 3;
    const ABRIL = 4;
    const MAIO = 5;
    const JUNHO = 6;
    const JULHO = 7;
    const AGOSTO = 8;
    const SETEMBRO = 9;
    const OUTUBRO = 10;
    const NOVEMBRO = 11;
    const DEZEMBRO = 12;

    public static $names = array(
        self::JANEIRO => "Janeiro",
        self::FEVEREIRO => "Fevereiro",
        self::MARCO => "Março",
        self::ABRIL => "Abril",
        self::MAIO => "Maio",
        self::JUNHO => "Junho",
        self::JULHO => "Julho",
        self::AGOSTO => "Agosto",
        self::SETEMBRO => "Setembro",
        self::OUTUBRO => "Outubro",
        self::NOVEMBRO => "Novembro",
        self::DEZEMBRO => "Dezembro"
    );

    public static $abreviacoes = array(
        self::JANEIRO => "Jan",
        self::FEVEREIRO => "Fev",
        self::MARCO => "Mar",
        self::ABRIL => "Abr",
        self::MAIO => "Mai",
        self::JUNHO => "Jun",
        self::JULHO => "Jul",
        self::AGOSTO => "Ago",
        self::SETEMBRO => "Set",
        self::OUTUBRO => "Out",
        self::NOVEMBRO => "Nov",
        self::DEZEMBRO => "Dez"
    );
}