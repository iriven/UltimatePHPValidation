<?php
/**
 * Created by PhpStorm.
 * User: Iriven
 * Date: 07/01/2017
 * Time: 14:38
 */

namespace UltimatePHPValidation\Rules;


use Ressources\Extensions\Plugins\Iso\Datas\Iso3166DataProvider;
use UltimatePHPValidation\Core\ValidationInterface;

/**
 * Class Currencycode
 * @package UltimatePHPValidation\Rules
 */
class Currencycode implements ValidationInterface
{
    /**
     * @param $currency
     * @return bool
     */
    public static function validate($currency)
    {
        $ISO = new Iso3166DataProvider();
        $currencyList = $ISO->getAllCurrenciesCodeAndName();
        if(in_array(strtoupper($currency), array_keys($currencyList), true)) return true;
        return false;
    }
    private static $CODE = 'NOT_CURRENCY_CODE';
    /**
     * @return string
     */
    public static function getCode(){return self::$CODE;}
}
