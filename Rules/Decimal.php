<?php
/**
 * Created by PhpStorm.
 * User: sjhc1170
 * Date: 18/01/2017
 * Time: 10:57
 */

namespace UltimatePHPValidation\Rules;


use UltimatePHPValidation\Core\Regex;
use UltimatePHPValidation\Core\ValidationInterface;

/**
 * Class Decimal
 * @package UltimatePHPValidation\Rules
 */
class Decimal extends Regex implements ValidationInterface
{
    /**
     * Checks that a value is a valid decimal.
     *
     * @param float $decimal The value the test for decimal.
     * @return bool
     */
    public static function validate($decimal)
    {
        $lnum = '[0-9]+';
        $dnum = '[0-9]*[\.]{'.$lnum.'}';
        $sign = '[+-]?';
        $exp = '(?:[eE]{'.$sign.'}{'.$lnum.'})?';
        $regex = '/^{'.$sign.'}(?:{'.$lnum.'}|{'.$dnum.'}){'.$exp.'}$/';
        // account for localized floats.
        $locale = ini_get('intl.default_locale') ?: 'fr_FR';
        $formatter = new \NumberFormatter($locale, \NumberFormatter::DECIMAL);
        $decimalPoint = $formatter->getSymbol(\NumberFormatter::DECIMAL_SEPARATOR_SYMBOL);
        $thousandsSep = $formatter->getSymbol(\NumberFormatter::GROUPING_SEPARATOR_SYMBOL);
        $decimal = str_replace($thousandsSep, '', $decimal);
        $decimal = str_replace($decimalPoint, '.', $decimal);
        return parent::check($decimal,$regex);
    }
    private static $CODE = 'NOT_DECIMAL';
    /**
     * @return string
     */
    public static function getCode(){return self::$CODE;}
}
