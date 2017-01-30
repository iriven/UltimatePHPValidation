<?php
/**
 * Created by PhpStorm.
 * User: sjhc1170
 * Date: 27/01/2017
 * Time: 10:19
 */

namespace UltimatePHPValidation\Rules;


use UltimatePHPValidation\Core\ValidationInterface;

class Ascii implements ValidationInterface
{
    /**
     * Check that the input value is within the ascii byte range.
     *
     * This method will reject all non-string values.
     *
     * @param string $value The value to check
     * @return bool
     */
    public static function validate($value)
    {
        if (!is_string($value))
            return false;
        return strlen($value) <= mb_strlen($value, 'utf-8');
    }
    private static $CODE = 'NOT_ASCII_STRING';
    /**
     * @return string
     */
    public static function getCode(){return self::$CODE;}
}
