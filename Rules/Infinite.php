<?php
/**
 * Created by PhpStorm.
 * User: sjhc1170
 * Date: 18/01/2017
 * Time: 15:41
 */

namespace UltimatePHPValidation\Rules;


use UltimatePHPValidation\Core\ValidationInterface;

/**
 * Class Infinite
 * @package UltimatePHPValidation\Rules
 */
class Infinite extends Numeric implements ValidationInterface
{
    public static function validate($number)
    {
        if(!parent::validate($number)) return false;
        return is_infinite($number);
    }
    private static $CODE = 'NOT_INFINITE';
    /**
     * @return string
     */
    public static function getCode(){return self::$CODE;}
}
