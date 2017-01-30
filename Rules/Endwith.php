<?php
/**
 * Created by PhpStorm.
 * User: sjhc1170
 * Date: 19/01/2017
 * Time: 09:48
 */

namespace UltimatePHPValidation\Rules;


use UltimatePHPValidation\Core\ValidationInterface;
/**
 * Class Endwith
 * @package UltimatePHPValidation\Rules
 */
class Endwith implements ValidationInterface
{
    public static function validate($value,$needle=null)
    {
        if(!$needle) return false;
        if (is_array($value))
            return end($value) == $needle;
        return mb_strripos($value, $needle, -1, $enc = mb_detect_encoding($value))
        === mb_strlen($value, $enc) - mb_strlen($needle, $enc);
    }
    private static $CODE = 'NOT_ENDING_WITH';
    /**
     * @return string
     */
    public static function getCode(){return self::$CODE;}
}
