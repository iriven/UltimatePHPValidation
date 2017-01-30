<?php
/**
 * Created by PhpStorm.
 * User: sjhc1170
 * Date: 19/01/2017
 * Time: 10:40
 */

namespace UltimatePHPValidation\Rules;


use UltimatePHPValidation\Core\ValidationInterface;

/**
 * Class Json
 * @package UltimatePHPValidation\Rules
 */
class Json implements ValidationInterface
{
    public static function validate($string)
    {
        if (!is_string($string) || '' === $string)
            return false;
        json_decode($string);
        return json_last_error() === JSON_ERROR_NONE;
    }
    private static $CODE = 'NOT_JSON_STRING';
    /**
     * @return string
     */
    public static function getCode(){return self::$CODE;}
}
