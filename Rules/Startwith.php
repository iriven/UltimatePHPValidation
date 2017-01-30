<?php
/**
 * Created by PhpStorm.
 * User: sjhc1170
 * Date: 19/01/2017
 * Time: 15:07
 */

namespace UltimatePHPValidation\Rules;


use UltimatePHPValidation\Core\ValidationInterface;

class Startwith implements ValidationInterface
{
    public static function validate($value,$needle=null)
    {
        if(!$needle) return false;
        if (is_array($value))
            return reset($value) == $needle;
        return 0 === mb_stripos($value, $needle, 0, mb_detect_encoding($value));
    }
    private static $CODE = 'NOT_STARTING_WITH';
    /**
     * @return string
     */
    public static function getCode(){return self::$CODE;}
}
