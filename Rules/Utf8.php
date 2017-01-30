<?php
/**
 * Created by PhpStorm.
 * User: sjhc1170
 * Date: 27/01/2017
 * Time: 10:59
 */

namespace UltimatePHPValidation\Rules;


use UltimatePHPValidation\Core\ValidationInterface;

class Utf8 implements ValidationInterface
{
    /**
     * Check that the input value is a utf8 string.
     *
     * This method will reject all non-string values.
     *
     * # Options
     *
     * - `extended` - Disallow bytes higher within the basic multilingual plane.
     *   MySQL's older utf8 encoding type does not allow characters above
     *   the basic multilingual plane. Defaults to false.
     *
     * @param string $value The value to check
     * @param bool $extended . See above for the supported options.
     * @return bool
     */
    public static function validate($value, $extended = false)
    {
        if (!is_string($value))
            return false;
        if ($extended) return true;
        $regex = '/[\x{10000}-\x{10FFFF}]/u';
        return preg_match($regex, $value) === 0;
    }
    private static $CODE = 'NOT_UTF8';
    /**
     * @return string
     */
    public static function getCode(){return self::$CODE;}
}
