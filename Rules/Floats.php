<?php
/**
 * Created by PhpStorm.
 * User: sjhc1170
 * Date: 19/01/2017
 * Time: 14:59
 */

namespace UltimatePHPValidation\Rules;


use UltimatePHPValidation\Core\ValidationInterface;

/**
 * Class Floats
 * @package UltimatePHPValidation\Rules
 */
class Floats implements ValidationInterface
{
    public static function validate($value)
    {
        return filter_var($value, FILTER_VALIDATE_FLOAT) !== false ;
    }
    private static $CODE = 'NOT_FLOAT_NUM';
    /**
     * @return string
     */
    public static function getCode(){return self::$CODE;}
}
