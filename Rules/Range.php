<?php
/**
 * Created by PhpStorm.
 * User: Iriven
 * Date: 18/01/2017
 * Time: 20:42
 */

namespace UltimatePHPValidation\Rules;


use UltimatePHPValidation\Core\ValidationInterface;

/**
 * Class Range
 * @package UltimatePHPValidation\Rules
 */
class Range extends Comparison implements ValidationInterface
{
    public static function validate($num, $params=[])
    {
        $defaults = [null,null,true];
        $params = is_array($params)?array_values($params):[$params];
        $params += $defaults;
        list($minValue, $maxValue, $inclusive) = $params;
        if(!$minValue OR !$maxValue) return is_finite($num);
        if (!Boolean::validate($inclusive) OR
            !Numeric::validate($minValue) OR
            !Numeric::validate($maxValue) OR
            !Numeric::validate($num))
        {
            self::$CODE = 'INVALID_ARGS';
            return false;
        }
        if (parent::validate($minValue,['>=',$maxValue]))
        {
            self::$CODE = 'MIN_GREATER_THAN_MAX';
            return false;
        }
        $minOperator= $inclusive? '>=':'>';
        $maxOperator= $inclusive? '<=':'<';
        return (parent::validate($num,[$minOperator,$minValue]) AND
                parent::validate($num,[$maxOperator,$maxValue])) ;
    }
    private static $CODE = 'NOT_IN_RANGE';
    /**
     * @return string
     */
    public static function getCode(){return self::$CODE;}
}
