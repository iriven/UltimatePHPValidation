<?php
/**
 * Created by PhpStorm.
 * User: sjhc1170
 * Date: 19/01/2017
 * Time: 10:34
 */

namespace UltimatePHPValidation\Rules;


use UltimatePHPValidation\Core\ValidationInterface;

/**
 * Class Equals
 * @package UltimatePHPValidation\Rules
 */
class Equals extends Comparison implements ValidationInterface
{
    public static function validate($value, $compareTo=null)
    {
        if (!Numeric::validate($value) AND
            !Numeric::validate($compareTo))
        {
            if(($value === $compareTo) OR ($value == $compareTo))
                return true;
            self::$CODE = 'NOT_EQUALS';
            return false;
        }
        return parent::validate($value,['=',$compareTo]);
    }

    private static $CODE = null;
    /**
     * @return string
     */
    public static function getCode(){return self::$CODE ?: parent::getCode();}
}
