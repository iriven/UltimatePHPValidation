<?php
/**
 * Created by PhpStorm.
 * User: sjhc1170
 * Date: 19/01/2017
 * Time: 10:51
 */

namespace UltimatePHPValidation\Rules;


use UltimatePHPValidation\Core\ValidationInterface;

class Maxlength extends Comparison implements ValidationInterface
{
    /**
     * Checks whether the length of a string is smaller or equal to a maximal length..
     *
     * @param $value
     * @param array $params
     * @return bool
     */
    public static function validate($value,$params=[])
    {
        $defaults = ['4000',true];
        $params = is_array($params)?array_values($params):[$params];
        $params += $defaults;
        list($maxValue,$inclusive) = $params;
        if (!Boolean::validate($inclusive) or
            !Numeric::validate($maxValue)
        )
        {
            self::$CODE = 'INVALID_ARGS';
            return false;
        }
        $operator = $inclusive? '<=' : '<';
        $strlen = function_exists('mb_strlen')? mb_strlen($value, mb_detect_encoding($value)): strlen($value);
        return parent::validate($strlen,[$operator,$maxValue]);
    }
    private static $CODE = 'LENGTH_GREATER_THAN_MAX';
    /**
     * @return string
     */
    public static function getCode(){return self::$CODE;}
}
