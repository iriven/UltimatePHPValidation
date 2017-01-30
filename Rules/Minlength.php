<?php
/**
 * Created by PhpStorm.
 * User: sjhc1170
 * Date: 19/01/2017
 * Time: 11:05
 */

namespace UltimatePHPValidation\Rules;


use UltimatePHPValidation\Core\ValidationInterface;

class Minlength extends Comparison implements ValidationInterface
{
    /**
     * Checks whether the length of a string is greater or equal to a minimal length.
     *
     * @param $value
     * @param array $params
     * @return bool
     */
    public static function validate($value,$params=[])
    {
        $defaults = ['0',true];
        $params = is_array($params)?array_values($params):[$params];
        $params += $defaults;
        list($minValue,$inclusive) = $params;
        if (!Boolean::validate($inclusive) or
            !Numeric::validate($minValue)
        )
        {
            self::$CODE = 'INVALID_ARGS';
            return false;
        }
        $operator = $inclusive? '>=' : '>';
        $strlen = function_exists('mb_strlen')? mb_strlen($value, mb_detect_encoding($value)): strlen($value);
        return parent::validate($strlen,[$operator,$minValue]);
    }
    private static $CODE = 'LENGTH_LESS_THAN_MIN';
    /**
     * @return string
     */
    public static function getCode(){return self::$CODE;}
}
