<?php
/**
 * Created by PhpStorm.
 * User: Iriven
 * Date: 24/01/2017
 * Time: 21:54
 */

namespace UltimatePHPValidation\Rules;


use UltimatePHPValidation\Core\ValidationInterface;

class Less extends Comparison implements ValidationInterface
{
    /**
     * @param $value
     * @param array $params
     * @return bool
     * @throws \Exception
     */
    public static function validate($value,$params=[])
    {
        $defaults = ['0',false];
        $params = is_array($params)?array_values($params):[$params];
        $params += $defaults;
        list($maxValue,$inclusive) = $params;
        if (!Boolean::validate($inclusive) OR !Numeric::validate($maxValue))
        {
            self::$CODE = 'INVALID_ARGS';
            return false;
        }
        $operator = $inclusive? '<=' : '<';
        return parent::validate($value,[$operator,$maxValue]);
    }
    private static $CODE = null;
    /**
     * @return string
     */
    public static function getCode(){return self::$CODE ?: parent::getCode();}
}
